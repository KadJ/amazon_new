<?php
/**
 * Created by ООО "Лемарс"
 * User: Evgen
 * Date: 25.02.12
 * Time: 16:48
 * Отправка запроса о утверждении условий оплаты на сайт разработчика
 */

if(!empty($this->bean->id)) {
	$this->bean->repayment_terms_approval = '1';
	$this->bean->save();
	$this->bean->retrieve($this->bean->id);
	// Оптавляем запрос
	$result = $this->bean->sendRequest("setRepaymentTermsApproval", $this->bean->repayment_terms_approval ? true : false);

	// Отправляем обратно на карточку обращения в тех.поддержку
	$url = "index.php?module=lm_TechnicalSupport&action=DetailView&record=" . $this->bean->id;
	header("Location: " . $url);
	exit;
}

