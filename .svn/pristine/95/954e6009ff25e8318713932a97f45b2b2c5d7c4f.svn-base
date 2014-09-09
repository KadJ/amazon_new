<?php
/**
 * Работа с сервером разработчиков
 */
if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/entryPoint.php');
include_once 'modules/lm_TechnicalSupport/lm_TechnicalSupport.php';

global $timedate;

if(isset($_REQUEST['XML'])) {
	$_REQUEST['XML'] = from_html($_REQUEST['XML']);
	/*
	$file = fopen("XML.xml", "w+");
	fwrite($file, $_REQUEST['XML']);
	fclose($file);
	exit;
	*/
	
	// Если пришел XML-запрос
	$xml = simplexml_load_string($_REQUEST['XML']);
	switch ($xml->case->action) {
		case 'send_answer':
			// Пришел запрос на добавление нового сообщения
			// Находим обращение по ID обращения
			$seedTechnicalSupport = new lm_TechnicalSupport();
			$seedTechnicalSupport->retrieve((string)$xml->case->id);
			if(!empty($seedTechnicalSupport->id)) {
				// Если найдена запись ображения в тех.поддержку
				// Добавляем сообщение в журнал сообщений
				$message = array(
									'user_id' => '',
									'user_name' => (string)$xml->user->name,
									'datetime' => time(),
									'comment' => (string)$xml->case->content,
									);
				$messages = unserialize(base64_decode($seedTechnicalSupport->work_log));
				$messages[] = $message;
				$seedTechnicalSupport->work_log = base64_encode(serialize($messages));
				
				$seedTechnicalSupport->status = 'answer';
				$seedTechnicalSupport->date_last_action_c = $timedate->nowDb();
				
				$seedTechnicalSupport->save();
			}
			// Формируем ответ
			$xml = "<answer><result>ok</result><code></code></answer>";
			echo $xml;
			
			break;
		case 'close':
			// Пришел запрос на закрытие сообщения
			// Находим обращение по ID обращения
			$seedTechnicalSupport = new lm_TechnicalSupport();
			$seedTechnicalSupport->retrieve((string)$xml->case->id);
			if(!empty($seedTechnicalSupport->id)) {
				// Если найдена запись ображения в тех.поддержку
				// Обновляем статус сообщения
				$seedTechnicalSupport->status = 'closed';
				$seedTechnicalSupport->status_work = 'closed';
				$seedTechnicalSupport->date_last_action_c = $timedate->nowDb();
				
				$seedTechnicalSupport->save();
			}
			// Формируем ответ
			$xml = "<answer><result>ok</result><code></code></answer>";
			echo $xml;
			break;
		case 'checkOnline':
			// Пришел запрос на проверку доступа до этой системы с сайта тех.поддержки
			// Формируем ответ
			$xml = "<answer><result>ok</result><code></code></answer>";
			echo $xml;
			break;
		case "startSynchronization":
			// Пришел запрос на проведение синхронизации
			// Находим обращение по ID обращения
			$seedTechnicalSupport = new lm_TechnicalSupport();
			$seedTechnicalSupport->retrieve((string)$xml->case->id);
			if(!empty($seedTechnicalSupport->id)) {
				// Если найдена запись обращения в тех.поддержку
				$seedTechnicalSupport->synchronization();
			}
			// Формируем ответ
			$xml = "<answer><result>ok</result><code></code></answer>";
			echo $xml;
			break;
	}
}
