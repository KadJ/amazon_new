<?php
if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/entryPoint.php');
include_once 'modules/lm_TechnicalSupport/lm_TechnicalSupport.php';

global $timedate;

// Формируем запрос в службу тех.поддержки
// Для получения обращений, содержащих неотправленные сообщения
$seedTechnicalSupport = new lm_TechnicalSupport();
$request = $seedTechnicalSupport->sendRequest("check_new_messages");
if($request['result'] == 'ok') {
	// Если ответ на запрос успешно получен
	// Извлекаем ответ
	$result = unserialize(base64_decode($request['code']));
	if(count($result)) {
		// Если обращения с неотправленными ответами нашлись
		foreach ($result as $tsInfo) {
			// Пробегаемся по присланным обращениям
			// Находя соответствия среди записей тех.поддержки
			$seedTechnicalSupport = new lm_TechnicalSupport();
			$seedTechnicalSupport->retrieve($tsInfo['id']);
			$seedTechnicalSupport->work_log = unserialize(base64_decode($seedTechnicalSupport->work_log));
			
			// Далее объединяем сообщения
			// За основу берем уже существующий на данный момент лог записи тех.поддержки
			$work_log_array = $seedTechnicalSupport->work_log;
			// Пробегаемся по присланному массиву
			foreach ($tsInfo['work_log'] as $message_info) {
				// Пытаемся найти текущее сообщение в массиве уже существующих сообщений
				$is_update = true;
				foreach ($work_log_array as $work_log_info) {
					if($work_log_info['datetime'] == $message_info['datetime_client']) {
						$is_update = false;
					}
				}
				if($is_update) {
					// Если текущее сообщение надо добавить в рабочий лог
					$work_log_array[] = array(
												'user_id' => '',
												'user_name' => $message_info['user_name'],
												'datetime' => $message_info['datetime'],
												'comment' => $message_info['comment'],
												);
				}
			}
			
			// Сортируем полученный лог сообщений согласно временной метке
			usort($work_log_array, 'lmSortWorkLog');
			
			// Записываем новый лог в базу
			// и обновляем статус обращения в службу тех.поддержки
			$seedTechnicalSupport->work_log = base64_encode(serialize($work_log_array));
			$seedTechnicalSupport->status = 'answer';
			$seedTechnicalSupport->save();
		}
	}
}

// Формируем запрос в службу тех.поддержки
// Для получения обращений, предполагаемых к закрытию
$seedTechnicalSupport = new lm_TechnicalSupport();
$request = $seedTechnicalSupport->sendRequest("check_new_status_close");
if($request['result'] == 'ok') {
	// Если ответ на запрос успешно получен
	// Извлекаем ответ
	$result = unserialize(base64_decode($request['code']));
	if(count($result)) {
		// Если обращения с неотправленными ответами нашлись
		foreach ($result as $tsInfo) {
			// Пробегаемся по присланным обращениям
			// Находя соответствия среди записей тех.поддержки
			$seedTechnicalSupport = new lm_TechnicalSupport();
			$seedTechnicalSupport->retrieve($tsInfo['id']);
			$seedTechnicalSupport->status = 'closed';
			$seedTechnicalSupport->save();
		}
	}
}

if(isset($_REQUEST['return_id'])) {
	// Если проверка новых сообщений инициирована из карточки обращения
	// Синхронизируем поля обращения
	$seedTechnicalSupport = new lm_TechnicalSupport();
	$seedTechnicalSupport->retrieve($_REQUEST['return_id']);
	$seedTechnicalSupport->synchronization();
}

if(isset($_REQUEST['return_module'])) {
	// Если после выполнения запроса надо вернуться обратно
	$module = isset($_REQUEST['return_module']) ? $_REQUEST['return_module'] : 'lm_TechnicalSupport';
	$action = isset($_REQUEST['return_action']) ? $_REQUEST['return_action'] : 'index';
	$id = isset($_REQUEST['return_id']) ? $_REQUEST['return_id'] : '';
	$url = "index.php?module=" . $module . "&action=" . $action . "&record=" . $id;
	header("Location: " . $url);
	exit;
}


function lmSortWorkLog($a, $b) {
	if($a['datetime'] > $b['datetime']) {
		return 1;
	} elseif ($a['datetime'] < $b['datetime']) {
		return -1;
	} else {
		return 0;
	}
}

