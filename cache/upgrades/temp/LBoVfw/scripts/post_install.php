<?php if(!defined('sugarEntry'))define('sugarEntry', true);

function post_install() {

require_once('modules/ModuleBuilder/parsers/ParserFactory.php');
foreach (array('editview', 'detailview') as $view) {
	$parser = ParserFactory::getParser($view, 'Users');
	if (!isset($parser->_viewdefs['panels']['LBL_CTI_PANEL'])) {
		$parser->_viewdefs['panels']['LBL_CTI_PANEL'] = array(
			array(
				array('name'=> 'cti_ext_c'),
			),
			array(
				array('name'=> 'cti_inbound_c'),
				array('name'=> 'cti_outbound_c'),
			),
		);
		$parser->handleSave(false);
	}
}


}