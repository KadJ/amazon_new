<?php

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
