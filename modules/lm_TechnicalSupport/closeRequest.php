<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
include_once 'modules/lm_TechnicalSupport/lm_TechnicalSupport.php';

global $current_user;

$focus = new lm_TechnicalSupport();
if(isset($_REQUEST['record']) AND $_REQUEST['record']) {
	$focus->retrieve($_REQUEST['record']);
	if(!empty($focus->id)) {
		// Если нормально проинициализирована запись
		$focus->status = "closed";
		$focus->save();
		$focus->sendRequest("close");
		// Перенаправляем на происмотр обращения в тех.поддержку
		$url = "index.php?module=lm_TechnicalSupport&action=DetailView&record=" . $focus->id;
		header("Location: " . $url);
		exit;
	}
}