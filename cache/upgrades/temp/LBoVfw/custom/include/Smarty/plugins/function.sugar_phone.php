<?php if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

function smarty_function_sugar_phone($params, &$smarty)
{
    if (!isset($params['value'])) {
        $smarty->trigger_error("sugar_phone: missing 'value' parameter");
        return '';
    }

    if (!isset($params['module'])) {
        $params['module'] = $GLOBALS['module'];
    }

    if (!isset($params['record'])) {
        $params['record'] = '';
    }

    require_once('modules/PhoneCalls/PhoneCall.php');
    return PhoneCall::getPhoneLink($params['value'], $params['module'], $params['record']);
}