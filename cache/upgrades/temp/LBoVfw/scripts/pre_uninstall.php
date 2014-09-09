<?php if(!defined('sugarEntry'))define('sugarEntry', true);

function pre_uninstall() {

require_once('modules/ModuleBuilder/parsers/ParserFactory.php');
foreach (array('editview', 'detailview') as $view) {
	$parser = ParserFactory::getParser($view, 'Users');
	if (isset($parser->_viewdefs['panels']['LBL_CTI_PANEL'])) {
		unset($parser->_viewdefs['panels']['LBL_CTI_PANEL']);
		$parser->handleSave(false);
	}
}

}
