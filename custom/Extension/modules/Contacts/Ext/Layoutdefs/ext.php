<?php

$layout_defs['Contacts']['subpanel_setup']['phonecalls'] = array(
	'order' => 1,
	'module' => 'PhoneCalls',
	'sort_order' => 'DESC',
	'sort_by' => 'date_entered',
	'title_key'	=> 'LBL_PHONECALLS_SUBPANEL_TITLE',
	'subpanel_name' => 'default',
	'get_subpanel_data'	=> 'function:getRelatedPhoneCallsQuery',
	'function_parameters' => array(
		'import_function_file' => 'custom/include/CTI/utils.php',
	),
);
