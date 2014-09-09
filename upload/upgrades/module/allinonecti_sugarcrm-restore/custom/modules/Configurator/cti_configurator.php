<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

require_once('modules/Configurator/Configurator.php');
require_once('include/Sugar_Smarty.php');

if (!is_admin($current_user)) {
    sugar_die('Admin Only Section.');
}

$default_config = array(
    'cti_client_id' => '',
    'cti_format' => '10',
    'cti_host' => 'mobile.prostiezvonki.ru',
    'cti_port' => '433',
);

foreach ($default_config as $key => $_) {
    if (!isset($GLOBALS['sugar_config'][$key])) {
        $GLOBALS['sugar_config'][$key] = '';
    }
}

$configurator = new Configurator();

if (!empty($_POST['save'])) {
    $configurator->saveConfig();
    header('Location: index.php?module=Administration&actionction=index');
}

$errors = array();


$ss = new Sugar_Smarty();
$ss->assign('MOD', $GLOBALS['mod_strings']);
$ss->assign('APP', $GLOBALS['app_strings']);
$ss->assign('APP_LIST', $GLOBALS['app_list_strings']);
$ss->assign('config', $configurator->config);
$ss->assign('default', $default_config);


echo $ss->fetch('custom/modules/Configurator/cti_configurator.tpl');
