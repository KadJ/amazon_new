<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
include_once 'modules/lm_TechnicalSupport/lm_TechnicalSupport.php';

global $current_user;

$focus = new lm_TechnicalSupport();
if(isset($_REQUEST['record']) AND $_REQUEST['record']) {
	$focus->retrieve($_REQUEST['record']);
	if(!empty($focus->id)) {
		// Если нормально проинициализирована запись
		if(isset($_REQUEST['requestContent'])) {
			// Если запрос пришел из формы
			// Добавляем сообщение в журнал сообщений
			$message = array(
								'user_id' => $current_user->id,
								'user_name' => $current_user->name,
								'datetime' => time(),
								'comment' => $_REQUEST['requestContent'],
								);
			$messages = unserialize(base64_decode($focus->work_log));
			$messages[] = $message;
			$focus->work_log = base64_encode(serialize($messages));
			$focus->status = 'in_process';
			$focus->save();
			
			// Отправляем запрос в службу тех.поддержки
			$focus->sendRequest('add_new_message', $_REQUEST['requestContent']);
			
			// Перенаправляем на происмотр обращения в тех.поддержку
			$url = "index.php?module=lm_TechnicalSupport&action=DetailView&record=" . $focus->id;
			header("Location: " . $url);
			exit;
		}
	}
}