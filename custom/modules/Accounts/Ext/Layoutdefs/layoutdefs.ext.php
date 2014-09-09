<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2010-12-20 02:56:01
$layout_defs["Accounts"]["subpanel_setup"]["account_aos_quotes"] = array (
  'order' => 100,
  'module' => 'AOS_Quotes',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'AOS_Quotes',
  'get_subpanel_data' => 'aos_quotes',
);


// created: 2010-12-20 02:56:01
$layout_defs["Accounts"]["subpanel_setup"]["account_aos_invoices"] = array (
  'order' => 100,
  'module' => 'AOS_Invoices',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'AOS_Invoices',
  'get_subpanel_data' => 'aos_invoices',
);


// created: 2010-12-20 02:56:01
$layout_defs["Accounts"]["subpanel_setup"]["account_aos_contracts"] = array (
  'order' => 100,
  'module' => 'AOS_Contracts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'AOS_Contracts',
  'get_subpanel_data' => 'aos_contracts',
);




$layout_defs['Accounts']['subpanel_setup']['phonecalls'] = array(
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



$layout_defs['Leads']['subpanel_setup']['phonecalls'] = array(
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

?>