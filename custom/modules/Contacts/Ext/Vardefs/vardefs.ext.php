<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2013-04-07 13:35:53

 

 // created: 2013-04-11 16:12:23

 

 // created: 2013-04-07 13:30:17

 


if (isset($dictionary['Contact']['fields']['phone_work']))
	$dictionary['Contact']['fields']['phone_work']['phone_main'] = true;
if (isset($dictionary['Contact']['fields']['phone_mobile']))
	$dictionary['Contact']['fields']['phone_mobile']['phone_search'] = 8;
if (isset($dictionary['Contact']['fields']['phone_home']))
	$dictionary['Contact']['fields']['phone_home']['phone_search'] = 7;
if (isset($dictionary['Contact']['fields']['phone_fax']))
	$dictionary['Contact']['fields']['phone_fax']['phone_search'] = 6;
if (isset($dictionary['Contact']['fields']['assistant_phone']))
	$dictionary['Contact']['fields']['assistant_phone']['phone_search'] = 5;
if (isset($dictionary['Contact']['fields']['name']))
	$dictionary['Contact']['fields']['name']['phone_search'] = 1;
if (isset($dictionary['Contact']['fields']['account_name']))
	$dictionary['Contact']['fields']['account_name']['phone_search'] = 2;
if (isset($dictionary['Contact']['fields']['phone_work']))
	$dictionary['Contact']['fields']['phone_work']['phone_search'] = 3;
if (isset($dictionary['Contact']['fields']['phone_other']))
	$dictionary['Contact']['fields']['phone_other']['phone_search'] = 4;


$dictionary["Contact"]["fields"]["aos_quotes"] = array (
  'name' => 'aos_quotes',
    'type' => 'link',
    'relationship' => 'contact_aos_quotes',
    'module'=>'AOS_Quotes',
    'bean_name'=>'AOS_Quotes',
    'source'=>'non-db',
);
$dictionary["Contact"]["relationships"]["contact_aos_quotes"] = array (
	'lhs_module'=> 'Contacts', 
	'lhs_table'=> 'contacts', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Quotes', 
	'rhs_table'=> 'aos_quotes', 
	'rhs_key' => 'billing_contact_id',
	'relationship_type'=>'one-to-many',
);


$dictionary["Contact"]["fields"]["aos_invoices"] = array (
  'name' => 'aos_invoices',
    'type' => 'link',
    'relationship' => 'contact_aos_invoices',
    'module'=>'AOS_Invoices',
    'bean_name'=>'AOS_Invoices',
    'source'=>'non-db',
);
$dictionary["Contact"]["relationships"]["contact_aos_invoices"] = array (
	'lhs_module'=> 'Contacts', 
	'lhs_table'=> 'contacts', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Invoices', 
	'rhs_table'=> 'aos_invoices', 
	'rhs_key' => 'billing_contact_id',
	'relationship_type'=>'one-to-many',
);


$dictionary["Contact"]["fields"]["aos_contracts"] = array (
  'name' => 'aos_contracts',
    'type' => 'link',
    'relationship' => 'contact_aos_contracts',
    'module'=>'AOS_Contracts',
    'bean_name'=>'AOS_Contracts',
    'source'=>'non-db',
);
$dictionary["Contact"]["relationships"]["contact_aos_contracts"] = array (
	'lhs_module'=> 'Contacts', 
	'lhs_table'=> 'contacts', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Contracts', 
	'rhs_table'=> 'aos_contracts', 
	'rhs_key' => 'contact_id',
	'relationship_type'=>'one-to-many',
);



 // created: 2013-04-07 13:28:11
$dictionary['Contact']['fields']['salutation']['len']=100;
$dictionary['Contact']['fields']['salutation']['comments']='Contact salutation (e.g., Mr, Ms)';
$dictionary['Contact']['fields']['salutation']['merge_filter']='disabled';

 

 // created: 2013-04-07 13:31:40

 


if (isset($dictionary['Contact']['fields']['phone_work']))
	$dictionary['Contact']['fields']['phone_work']['phone_main'] = true;
if (isset($dictionary['Contact']['fields']['phone_mobile']))
	$dictionary['Contact']['fields']['phone_mobile']['phone_search'] = 8;
if (isset($dictionary['Contact']['fields']['phone_home']))
	$dictionary['Contact']['fields']['phone_home']['phone_search'] = 7;
if (isset($dictionary['Contact']['fields']['phone_fax']))
	$dictionary['Contact']['fields']['phone_fax']['phone_search'] = 6;
if (isset($dictionary['Contact']['fields']['assistant_phone']))
	$dictionary['Contact']['fields']['assistant_phone']['phone_search'] = 5;
if (isset($dictionary['Contact']['fields']['name']))
	$dictionary['Contact']['fields']['name']['phone_search'] = 1;
if (isset($dictionary['Contact']['fields']['account_name']))
	$dictionary['Contact']['fields']['account_name']['phone_search'] = 2;
if (isset($dictionary['Contact']['fields']['phone_work']))
	$dictionary['Contact']['fields']['phone_work']['phone_search'] = 3;
if (isset($dictionary['Contact']['fields']['phone_other']))
	$dictionary['Contact']['fields']['phone_other']['phone_search'] = 4;

?>