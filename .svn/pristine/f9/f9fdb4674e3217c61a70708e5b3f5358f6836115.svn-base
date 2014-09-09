<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class AOS_QuotesViewEdit extends ViewEdit {
	function AOS_QuotesViewEdit(){
 		parent::ViewEdit();
 	}
	
	function display(){
		$this->populateQuoteTemplates();
		parent::display();
	}

	function populateQuoteTemplates(){
		global $app_list_strings;
		
		$sql = "SELECT id, name FROM aos_pdf_templates WHERE deleted='0' AND type='AOS_Quotes'";
		$res = $this->bean->db->query($sql);
		
		$app_list_strings['template_ddown_c_list'] = array();
		while($row = $this->bean->db->fetchByAssoc($res)){
			$app_list_strings['template_ddown_c_list'][$row['id']] = $row['name'];
		}
	}
}
?>
