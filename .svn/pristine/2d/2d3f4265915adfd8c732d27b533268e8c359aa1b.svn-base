<?php
include_once 'modules/Schedulers/Scheduler.php';
include_once 'modules/Schedulers/_AddJobsHere.php';

if(isset($_REQUEST['record']) AND $_REQUEST['record']) {
	$seedScheduler = new Scheduler();
	$seedScheduler->retrieve($_REQUEST['record']);
	if(!empty($seedScheduler->id)) {
		$function = preg_replace("|function::|is", "", $seedScheduler->job);
		switch($function) {
			case 'lmSendFax':
                lmSendFax();
				break;
		}

	}
}