<?php

class PhoneCallsController extends SugarController
{

    function PhoneCallsSaleController()
    {
        parent::SugarController();
    }

    public function action_popup()
    {
        die('no popup for this module');
    }

    public function action_search()
    {
        $this->view = 'search';
    }

    public function action_saveCall()
    {
        if (empty($_REQUEST['event'])) {
            die('event is empty');
        }

        $event = $_REQUEST['event'];

        $phonecall = new PhoneCall;

        switch ($event['type']) {
            case 2:
                $event['direction'] = 0;
                $phonecall->id = PhoneCall::getCallEvetId($event['callID']);
                $phonecall->new_with_id = true;
                $phonecall->phone_master = $event['from'];
                $phonecall->phone_slave = $event['to'];
                $phonecall->direction = $event['direction'];
                $phonecall->online = 1;
                $phonecall->status = 'CALLING';
                break;
            case 4:
                $id = PhoneCall::getCallEvetId($event['callID']);
                if (PhoneCall::isUsageId($id)) {
                    $phonecall->id = $id;
                }
                $phonecall->phone_master = $event['from'];
                $phonecall->phone_slave = $event['to'];
                $phonecall->direction = $event['direction'];
                $phonecall->status = $event['duration'] > 0 ? 'ANSWER' : 'NOANSWER';
                $phonecall->online = '0';
                $phonecall->talk_start = gmdate('Y-m-d H:i:s', $event['end'] - $event['duration']);
                $phonecall->talk_duration = $event['duration'];
                $phonecall->online_duration = $event['end'] - $event['start'];
                $phonecall->file_url = $event['record'];
                break;
        }

        $phonecall->name = implode(' -> ', array($phonecall->phone_master, $phonecall->phone_slave));
        if (empty($event['direction'])) {
            $phonecall->assigned_user_id = PhoneCall::getUserIdByInternalNumber($event['to']);
        } else {
            $phonecall->assigned_user_id = PhoneCall::getUserIdByInternalNumber($event['from']);
        }
        $phonecall->save();

        die(JSON::encode($phonecall->id));
    }

    public function action_transferCall()
    {
        if (empty($_REQUEST['event'])) {
            die('event is empty');
        }

        $event = $_REQUEST['event'];

        die(JSON::encode(PhoneCall::getRedirectPhoneNumber($event['from'])));
    }
    
    public function action_log()
    {
        $level = 'info';
        $message = null;
        if (!empty($_REQUEST['log_level'])) {
            $level = $_REQUEST['log_level'];
        }
        $message = $_REQUEST['message'];
        
        switch ($level) {
            case 'info':
                LoggerManager::getLogger()->info($message);
                break;
            case 'fatal':
                LoggerManager::getLogger()->fatal($message);
                break;
        }
        die;
    }
}
