<?PHP
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2011 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once('modules/lm_TechnicalSupport/lm_TechnicalSupport_sugar.php');
class lm_TechnicalSupport extends lm_TechnicalSupport_sugar {
	
	var $version = "2.0";
	var $datetime;
	
	function lm_TechnicalSupport(){	
		parent::lm_TechnicalSupport_sugar();
	}
	
	/**
	 * Сохранение запроса в тех.поддержку
	 * @param boolean $check_notify
	 */
	public function save($check_notify = false) {
		global $current_user;
		
		$is_update = true;
		if(empty($this->id)) {
			// Если это первое сохранение запроса в тех.поддержку
			// Записываем в рабочий лог описание в виде первого сообщения
			$this->datetime = time();
			$message = array(
								'user_id' => $current_user->id,
								'user_name' => $current_user->name,
								'datetime' => $this->datetime,
								'comment' => $this->description,
								);
			$messages = unserialize(base64_decode($this->work_log));
			$messages[] = $message;
			$this->work_log = base64_encode(serialize($messages));
			
			// Назначаем обращение текущему пользователю
			$this->assigned_user_id = $current_user->id;
			$is_update = false;
			
			// Определяем статус отправки запроса
			$this->request_status = 'sending_expectation';
		}
		
		parent::save($check_notify);
		
		if(!$is_update) {
			// Если происходит добавление нового запроса
			$this->retrieve($this->id);
			$request = $this->sendRequest("add_new_case", $this->description);

			if($request['result'] == 'error') {
				$this->request_status = 'sending_error';
				$this->save();
			} else {
				// Если нормальный ответ от службы тех.поддержки получен
				// Определяем номер тикета
				$this->ticket_number = $request['code'];
				$this->name .= " (#".$this->ticket_number.")";
				parent::save($check_notify);
			}
			// Синхронизируем обращение
			$this->synchronization();
		}
	}
	
	/**
	 * Отправить запрос в службу тех.поддержки
	 * @param string $action
	 * @param string $content
	 */
	public function sendRequest($action, $content = '') {
		global $sugar_config;
		$administration = new Administration();
		$administration->retrieveSettings('system');

		// Формируем XML-запрос
		$smarty = new Sugar_Smarty();
		if(empty($this->datetime)) {
			$this->datetime = time();
		}
		$request_smarty = array(
								'SYSTEM_UNIQUE_KEY' => $sugar_config['unique_key'],
								'SYSTEM_SITE_URL' => $sugar_config['site_url'],
								'SYSTEM_SITE_NAME' => !empty($administration->settings['system_name']) ? $administration->settings['system_name'] : '',
								'SYSTEM_SUGAR_VERSION' => $sugar_config['sugar_version'],
								'TS_VERSION' => $this->version,
		
								'USER_NAME' => $this->assigned_user_name,
		
								'ID' => $this->id,
								'DATETIME' => $this->datetime,
								'TICKET_NUMBER' => $this->ticket_number,
								'ACTION' => $action,
								'PRIORITY' => $this->priority,
								'STATUS' => $this->status,
								'TYPE' => $this->type,
								'NAME' => $this->name,
								'CONTENT' => $content,
								);
		
		$smarty->assign("request", $request_smarty);
		$xml = $smarty->fetch("modules/lm_TechnicalSupport/tpls/request.tpl");
		// Отправляем XML-запрос
		$ch = curl_init();
		$ch_options = array(
							CURLOPT_URL => 'http://crm.lemars.ru/tss.php',
							CURLOPT_FOLLOWLOCATION => false,
							CURLOPT_POST => true,
							CURLOPT_HEADER => false,
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_CONNECTTIMEOUT => 15,
							CURLOPT_TIMEOUT => 100,
							CURLOPT_POSTFIELDS => array('XML' => $xml),
							);
		curl_setopt_array($ch, $ch_options);
		$result = curl_exec($ch);
		curl_close($ch);

		$result_array = array();
		if(!$result) {
			// Если не пришло никакого ответ
			// Скорее всего домен не доступен из-за ограниченности интернета
			$result_array = array(
									'result' => 'error',
									'code' => 'no answer',
									);
		} else {
			$xml = simplexml_load_string($result);
			$result_array = array(
									'result' => (string)$xml->result,
									'code' => (string)$xml->code,
									);
		}
		return $result_array;
	}
	
	/**
	 * Проверить статус соединения с службой тех.поддержки
	 * @return string
	 */
	public function checkOnline() {
		global $sugar_config;
		global $timedate;
		$request = $this->sendRequest('checkOnline');
		$status = 'offline';

		if ($request['result'] == 'ok' AND $request['code'] == 'single') {
			$status = 'proceeding_connection';
		} elseif ($request['result'] == 'ok' AND $request['code'] == 'full') {
			$status = 'online';
		}

		// Работа с планировщиком
		// Пробуем найти запись в планировщике, отвечающую за работу с технической поддержкой
		$job_name = $sugar_config['site_url'] . '/ts_check.php?from=scheduler';
		$sql = "
				SELECT
					*
				FROM
					`schedulers`
				WHERE
					`job` = '".$job_name."'
					AND
					`deleted` = 0
		";
		$result = $this->db->query($sql, true);

		if(!$result->num_rows) {
			// Если запись не найдена
			// Добавляем ее в базу данных
			$start_status = 'Active';
			if($status == 'online' OR $status == 'offline') {
				$start_status = 'Inactive';
			}
			$sql = "
					INSERT INTO
						`schedulers`
					SET
						`id` = '".create_guid()."',
						`deleted` = 0,
						`date_entered` = '".$timedate->nowDate()."',
						`date_modified` = '".$timedate->nowDate()."',
						`created_by` = '1',
						`modified_user_id` = '1',
						`name` = 'Проверка новых ответов технической поддержки',
						`job` = '".$job_name."',
						`date_time_start` = '".$timedate->nowDate()."',
						`date_time_end` = '2020-12-31 23:59:59',
						`job_interval` = '*/10::*::*::*::*',
						`status` = '".$start_status."',
						`catch_up` = '1'
			";
			$this->db->query($sql, true);
			
		}
		$counter = 0;
		while ($row = $this->db->fetchByAssoc($result)) {
			if($counter) {
				// Если записей в планировщике нашлось больше одной - удаляем все лишние
				$sql = "DELETE FROM `schedulers` WHERE `id` = '".$row['id']."'";
				$this->db->query($sql, true);
				continue;
			}
			switch ($status) {
				case 'online';
					// Соединение установлено и работает нормально
					// Приостанавливаем работу крона
					if($row['status'] != 'Inactive') {
						$sql = "UPDATE `schedulers` SET `status` = 'Inactive' WHERE `id` = '".$row['id']."'";
						$this->db->query($sql, true);
					}
					break;
				case 'proceeding_connection';
					// Соединение напрямую работает в одну сторону
					// Запускаем работу крона
					if($row['status'] != 'Active') {
						$sql = "UPDATE `schedulers` SET `status` = 'Active' WHERE `id` = '".$row['id']."'";
						$this->db->query($sql, true);
					}
					break;
				case 'offline':
					// Соединение не работает
					// Приостанавливаем работу крона
					if($row['status'] != 'Inactive') {
						$sql = "UPDATE `schedulers` SET `status` = 'Inactive' WHERE `id` = '".$row['id']."'";
						$this->db->query($sql, true);
					}
					break;
			}
			$counter++;
		}
		
		return $status;
	}

	/**
	 * Синхронизация текущего обращения с сервером разработчика
	 */
	public function synchronization() {
		global $timedate;
		$result = $this->sendRequest("synchronization");
		$data = unserialize(base64_decode($result['code']));
		$GLOBALS["log"]->fatal($data);
		// Разбираем данные
		$this->payment = $data['payment'];
		$this->type = $data['type'];
		$this->status = $data['status'];
		$this->status_work = $data['status_work'];
		$this->cost_type = $data['cost_type'];
		$this->fix_cost = $data['fix_cost'];
		$this->time_hour_cost = $data['time_hour_cost'];
		$this->repayment_terms_autoyes = $data['repayment_terms_autoyes'] ? 1 : 0;
		$this->date_finish_plan = $data["date_finish_plan"];
		$this->date_finish_fact = $data["date_finish_fact"];

		if($this->cost_type != $this->fetched_row['cost_type'] OR $this->cost_type == 'time' AND $this->time_hour_cost != $this->fetched_row['time_hour_cost']) {
			// Если изменился тип оплаты
			// или при повременной оплате изменилась стоимость часа работы
			// Снимаем отметку о одобрении условий оплаты и стоимости
			$this->repayment_terms_approval = 0;
			$this->cost_approval = 0;
		} elseif($this->fix_cost != $this->fetched_row['fix_cost']) {
			// Если изменилась конечная стоимость
			// Снимаем отметку о одобрении стоимости
			$this->cost_approval = 0;
		}

		// Автоустановка условий оплаты
		if($this->repayment_terms_autoyes == 1 OR $this->cost_type == 'free') {
			// Если пришел признак о автоутверждении стоимости
			// Или работы были оценены как бесплатные
			// То автоматически ставим условия оплаты как утвержденные
			$this->repayment_terms_approval = 1;
		}

		if($this->cost_type == 'free') {
			// Если работы определены как бесплатные
			// То автоматически утверждаем стоимость
			$this->cost_approval = 1;
		}

		$this->save();
		$this->retrieve($this->id);
	}
	
}
?>