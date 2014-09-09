<?php

if (isset($dictionary['Lead']['fields']['phone_work']))
	$dictionary['Lead']['fields']['phone_work']['phone_main'] = true;
if (isset($dictionary['Lead']['fields']['phone_home']))
	$dictionary['Lead']['fields']['phone_home']['phone_search'] = 8;
if (isset($dictionary['Lead']['fields']['phone_other']))
	$dictionary['Lead']['fields']['phone_other']['phone_search'] = 7;
if (isset($dictionary['Lead']['fields']['phone_fax']))
	$dictionary['Lead']['fields']['phone_fax']['phone_search'] = 6;
if (isset($dictionary['Lead']['fields']['assistant_phone']))
	$dictionary['Lead']['fields']['assistant_phone']['phone_search'] = 5;
if (isset($dictionary['Lead']['fields']['name']))
	$dictionary['Lead']['fields']['name']['phone_search'] = 1;
if (isset($dictionary['Lead']['fields']['account_name']))
	$dictionary['Lead']['fields']['account_name']['phone_search'] = 2;
if (isset($dictionary['Lead']['fields']['phone_mobile']))
	$dictionary['Lead']['fields']['phone_mobile']['phone_search'] = 3;
if (isset($dictionary['Lead']['fields']['phone_work']))
	$dictionary['Lead']['fields']['phone_work']['phone_search'] = 4;
