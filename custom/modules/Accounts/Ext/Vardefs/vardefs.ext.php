<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2010-12-20 02:55:45
$dictionary["Account"]["fields"]["aos_quotes"] = array (
  'name' => 'aos_quotes',
    'type' => 'link',
    'relationship' => 'account_aos_quotes',
    'module'=>'AOS_Quotes',
    'bean_name'=>'AOS_Quotes',
    'source'=>'non-db',
);


// created: 2010-12-20 02:56:01
$dictionary["Account"]["relationships"]["account_aos_quotes"] = array (
	'lhs_module'=> 'Accounts', 
	'lhs_table'=> 'accounts', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Quotes', 
	'rhs_table'=> 'aos_quotes', 
	'rhs_key' => 'billing_account_id',
	'relationship_type'=>'one-to-many',
);


// created: 2010-12-20 02:56:01
$dictionary["Account"]["fields"]["aos_invoices"] = array (
  'name' => 'aos_invoices',
    'type' => 'link',
    'relationship' => 'account_aos_invoices',
    'module'=>'AOS_Invoices',
    'bean_name'=>'AOS_Invoices',
    'source'=>'non-db',
);


// created: 2010-12-20 02:56:01
$dictionary["Account"]["relationships"]["account_aos_invoices"] = array (
	'lhs_module'=> 'Accounts', 
	'lhs_table'=> 'accounts', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Invoices', 
	'rhs_table'=> 'aos_invoices', 
	'rhs_key' => 'billing_account_id',
	'relationship_type'=>'one-to-many',
);


// created: 2010-12-20 02:56:01
$dictionary["Account"]["fields"]["aos_contracts"] = array (
  'name' => 'aos_contracts',
    'type' => 'link',
    'relationship' => 'account_aos_contracts',
    'module'=>'AOS_Contracts',
    'bean_name'=>'AOS_Contracts',
    'source'=>'non-db',
);


// created: 2010-12-20 02:56:01
$dictionary["Account"]["relationships"]["account_aos_contracts"] = array (
	'lhs_module'=> 'Accounts', 
	'lhs_table'=> 'accounts', 
	'lhs_key' => 'id',
	'rhs_module'=> 'AOS_Contracts', 
	'rhs_table'=> 'aos_contracts', 
	'rhs_key' => 'contract_account_id',
	'relationship_type'=>'one-to-many',
);




if (isset($dictionary['Account']['fields']['phone_office']))
	$dictionary['Account']['fields']['phone_office']['phone_main'] = true;
if (isset($dictionary['Account']['fields']['phone_fax']))
	$dictionary['Account']['fields']['phone_fax']['phone_search'] = 4;
if (isset($dictionary['Account']['fields']['name']))
	$dictionary['Account']['fields']['name']['phone_search'] = 1;
if (isset($dictionary['Account']['fields']['phone_office']))
	$dictionary['Account']['fields']['phone_office']['phone_search'] = 2;
if (isset($dictionary['Account']['fields']['phone_alternate']))
	$dictionary['Account']['fields']['phone_alternate']['phone_search'] = 3;



$dictionary['Account']['fields']['account_source'] =
    array(
        'name' => 'account_source',
        'vname' => 'LBL_ACCOUNT_SOURCE',
        'type' => 'enum',
        'options' => 'account_source_dom',
        'len' => 50,
        'comment' => 'The Company is of this type',
    );



if (isset($dictionary['Account']['fields']['phone_office']))
	$dictionary['Account']['fields']['phone_office']['phone_main'] = true;
if (isset($dictionary['Account']['fields']['phone_fax']))
	$dictionary['Account']['fields']['phone_fax']['phone_search'] = 4;
if (isset($dictionary['Account']['fields']['name']))
	$dictionary['Account']['fields']['name']['phone_search'] = 1;
if (isset($dictionary['Account']['fields']['phone_office']))
	$dictionary['Account']['fields']['phone_office']['phone_search'] = 2;
if (isset($dictionary['Account']['fields']['phone_alternate']))
	$dictionary['Account']['fields']['phone_alternate']['phone_search'] = 3;


 // created: 2013-04-11 16:40:38
$dictionary['Account']['fields']['account_type']['len']=100;
$dictionary['Account']['fields']['account_type']['audited']=true;
$dictionary['Account']['fields']['account_type']['comments']='The Company is of this type';
$dictionary['Account']['fields']['account_type']['merge_filter']='disabled';

 
?>