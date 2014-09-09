<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2011 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/


require_once('include/MVC/View/views/view.detail.php');

class lm_TechnicalSupportViewDetail extends ViewDetail {


 	function lm_TechnicalSupportViewDetail(){
 		parent::ViewDetail();
 	}

 	/**
 	 * display
 	 * Override the display method to support customization for the buttons that display
 	 * a popup and allow you to copy the account's address into the selected contacts.
 	 * The custom_code_billing and custom_code_shipping Smarty variables are found in
 	 * include/SugarFields/Fields/Address/DetailView.tpl (default).  If it's a English U.S.
 	 * locale then it'll use file include/SugarFields/Fields/Address/en_us.DetailView.tpl.
 	 */
 	function display(){
 		global $mod_strings;
		global $app_list_strings;

 		// Форма отправки нового сообщения
 		$smarty = new Sugar_Smarty();
 		
 		$messages = unserialize(base64_decode($this->bean->work_log));
 		$messages_smarty = array();
 		foreach ($messages as $message) {
 			$comment = $message['comment'];
 			$comment = str_replace("\n", "<BR>", $comment);
 			$messages_smarty[] = array(
 										'USER_ID' => $message['user_id'],
 										'USER_NAME' => $message['user_name'],
 										'DATE' => date("d.m.Y", $message['datetime']),
 										'TIME' => date("H:i", $message['datetime']),
 										'COMMENT' => $comment,
 										);
 		}
 		
 		$smarty->assign("MOD", $mod_strings);
 		$smarty->assign("ID", $this->bean->id);
 		$smarty->assign("messages", $messages_smarty);
 		
 		$WORK_LOG = $smarty->fetch("modules/lm_TechnicalSupport/tpls/requestForm.tpl");
 		
 		$this->ss->assign('WORK_LOG', $WORK_LOG);

		// Определяем отображение надписи "Тип оплаты"
		$cost_type = $app_list_strings['lm_ts_cost_type_list'][$this->bean->cost_type];
		if($this->bean->cost_type == 'time' AND $this->bean->time_hour_cost > 0) {
			$cost_type .= ' ( Стоимость часа работы: ' . number_format($this->bean->time_hour_cost, 0, ",", " ") . ' рублей )';
		}
		$this->ss->assign("COST_TYPE", $cost_type);

		// Утверждение типа оплаты
		$smarty = new Sugar_Smarty();

		$ts_smarty = array(
			"ID" => $this->bean->id,
			"REPAYMENT" => $this->bean->repayment_terms_approval,
			"REPAYMENT_AUTOYES" => $this->bean->repayment_terms_autoyes,
			"COST_APPROVAL" => $this->bean->cost_approval,
			"COST_TYPE" => $this->bean->cost_type,
			"COST" => (float)$this->bean->fix_cost,
			"STATUS_WORK" => $this->bean->status_work,
		);
		$smarty->assign("ts", $ts_smarty);
		$smarty->assign("APP_LIST_STRINGS", $app_list_strings);

		$this->ss->assign("REPAYMENT_TERMS_APPROVAL", $smarty->fetch("modules/lm_TechnicalSupport/tpls/DetailViewRepaymentTermsApproval.tpl"));
		$this->ss->assign("COST_APPROVAL", $smarty->fetch("modules/lm_TechnicalSupport/tpls/DetailViewCostApproval.tpl"));
		$this->ss->assign("STATUS_WORK", $smarty->fetch("modules/lm_TechnicalSupport/tpls/DetailViewStatusWork.tpl"));

		parent::display();
 	} 	
}

?>