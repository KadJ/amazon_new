<?php 

$admin_option_defs = array(
	'Administration' => array(
		'cti_configurator' => array(
			'Administration',
			'LBL_MANAGE_CTI',
			'LBL_CTI',
			'index.php?module=Configurator&action=cti_configurator',
		),
	),
);

$admin_group_header[] = array('LBL_CTI_TITLE', '', false, $admin_option_defs, 'LBL_CTI_DESC');
