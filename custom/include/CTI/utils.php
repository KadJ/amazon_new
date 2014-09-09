<?php

function getRelatedPhoneCallsQuery($parameters)
{
	require_once('modules/PhoneCalls/PhoneCall.php');

	$bean = $GLOBALS['focus'];
    if (empty($bean)) {
        $bean = BeanFactory::getBean($_REQUEST['module'], $_REQUEST['record']);
    }

	$phone_fields = PhoneCall::getPhoneFields($bean);
	
	$phones = array();
	
	foreach ($phone_fields as &$field) {
		$phones[] = $bean->$field;
	} unset($field);

	return PhoneCall::getBeanRelatedPhoneCallsQuery($phones);
}