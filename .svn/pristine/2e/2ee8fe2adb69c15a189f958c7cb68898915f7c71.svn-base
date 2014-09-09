<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
$smarty = new Sugar_Smarty();

$seedTechnicalSupport = new lm_TechnicalSupport();
$online_status = $seedTechnicalSupport->checkOnline();

$smarty->assign("STATUS", $online_status);

if(!empty($this->bean->id)) {
	// Если проверка статуса была вызвана из карточки обращения
	$ts_smarty = array(
		"ID" => $this->bean->id,
		"NAME" => $this->bean->name,
	);
	$smarty->assign("ts", $ts_smarty);
}

$smarty->display("modules/lm_TechnicalSupport/tpls/checkOnline.tpl");