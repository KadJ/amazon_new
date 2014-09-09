<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class CTI_MainHook
{

    public function displayJavascript($event, $arguments)
    {
        if(empty($GLOBALS['app']->headerDisplayed)) {
            return;
        }
        
        if (isset($_REQUEST["to_pdf"]) && $_REQUEST["to_pdf"] === '1') {
            return;
        }

        require_once('modules/PhoneCalls/PhoneCall.php');
        echo '<script src="' . getJSPath('custom/include/javascript/prostiezvonki.js') . '"></script>';
        echo '<script src="' . getJSPath('modules/PhoneCalls/js/PhoneCalls.js') . '"></script>';


        $phonecall_settings = getJSONobj()->encode(PhoneCall::getPhoneCallsSettings());


        echo '<script>var cti = ' . $phonecall_settings . ';</script>';
    }

}
