<?php

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
