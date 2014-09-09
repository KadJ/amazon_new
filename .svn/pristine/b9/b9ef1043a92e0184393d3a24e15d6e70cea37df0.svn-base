<?php
/**
 * Created by ООО "Лемарс"
 * User: Evgen
 * Date: 25.02.12
 * Time: 16:48
 * Отправка запроса о утверждении стоимости оплаты на сайт разработчика
 */

if(!empty($this->bean->id) AND isset($_REQUEST['status']) AND in_array($_REQUEST['status'], array('completion','closed'))) {

	$result = $this->bean->sendRequest("setStatusWork", $_REQUEST['status']);
	$this->bean->synchronization();

	// Отправляем обратно на карточку обращения в тех.поддержку
	$url = "index.php?module=lm_TechnicalSupport&action=DetailView&record=" . $this->bean->id;
	header("Location: " . $url);
	exit;
}

