<?php
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

$dictionary['lm_TechnicalSupport'] = array(
	'table'=>'lm_technicalsupport',
	'audited'=>true,
	'fields'=>array (
  'ticket_number' => 
  array (
    'required' => false,
    'name' => 'ticket_number',
    'vname' => 'LBL_TICKET_NUMBER',
    'type' => 'int',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => '11',
    'size' => '20',
    'enable_range_search' => false,
    'disable_num_format' => '1',
  ),
  'priority' => 
  array (
    'required' => false,
    'name' => 'priority',
    'vname' => 'LBL_PRIORITY',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => 'average',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'options' => 'lm_priority_list',
    'studio' => 'visible',
    'dependency' => false,
  ),
  'status' => 
  array (
    'required' => false,
    'name' => 'status',
    'vname' => 'LBL_STATUS',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => 'new',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'options' => 'lm_ts_status_list',
    'studio' => 'visible',
    'dependency' => false,
  ),
	'status_work' =>
		array (
			'required' => false,
			'name' => 'status_work',
			'vname' => 'LBL_STATUS_WORK',
			'type' => 'enum',
			'massupdate' => 0,
			'default' => 'none',
			'comments' => '',
			'help' => '',
			'importable' => 'true',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => '0',
			'audited' => true,
			'reportable' => true,
			'len' => 100,
			'size' => '20',
			'options' => 'lm_ts_status_work_list',
			'studio' => 'visible',
			'dependency' => false,
		),
		'payment' =>
		array (
			'required' => false,
			'name' => 'payment',
			'vname' => 'LBL_PAYMENT',
			'type' => 'enum',
			'massupdate' => 0,
			'default' => 'none',
			'comments' => '',
			'help' => '',
			'importable' => 'true',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => '0',
			'audited' => true,
			'reportable' => true,
			'len' => 100,
			'size' => '20',
			'options' => 'lm_ts_payment_list',
			'studio' => 'visible',
			'dependency' => false,
		),
  'type' => 
  array (
    'required' => false,
    'name' => 'type',
    'vname' => 'LBL_TYPE',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => 'new_functions',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => true,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'options' => 'lm_ts_type_list',
    'studio' => 'visible',
    'dependency' => false,
  ),
  'online_status' => 
  array (
    'required' => false,
    'name' => 'online_status',
    'vname' => 'LBL_ONLINE_STATUS',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => 'new',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'options' => 'lm_technical_support_online_status_list',
    'studio' => 'visible',
    'dependency' => false,
  ),
  'work_log' => 
  array (
    'required' => false,
    'name' => 'work_log',
    'vname' => 'LBL_WORK_LOG',
    'type' => 'text',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'size' => '20',
    'studio' => 'visible',
    'rows' => '4',
    'cols' => '20',
  ),
  'request_status' => 
  array (
    'required' => false,
    'name' => 'request_status',
    'vname' => 'LBL_REQUEST_STATUS',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => 'sending_expectation',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'options' => 'lm_ts_request_status_list',
    'studio' => 'visible',
    'dependency' => false,
  ),
	'cost_type' =>
		array (
			'required' => false,
			'name' => 'cost_type',
			'vname' => 'LBL_COST_TYPE',
			'type' => 'enum',
			'massupdate' => 0,
			'default' => 'none',
			'comments' => '',
			'help' => '',
			'importable' => 'true',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => '0',
			'audited' => true,
			'reportable' => true,
			'len' => 100,
			'size' => '20',
			'options' => 'lm_ts_cost_type_list',
			'studio' => 'visible',
			'dependency' => false,
		),
		'repayment_terms_approval' =>
		array (
			'required' => false,
			'name' => 'repayment_terms_approval',
			'vname' => 'LBL_REPAYMENT_TERMS_APPROVAL',
			'type' => 'bool',
			'massupdate' => 0,
			'comments' => '',
			'help' => '',
			'importable' => 'true',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => '0',
			'audited' => true,
			'reportable' => true,
			'enable_range_search' => false,
			'disable_num_format' => '1',
			'default' => '0',
		),
		'repayment_terms_autoyes' =>
		array (
			'required' => false,
			'name' => 'repayment_terms_autoyes',
			'vname' => 'LBL_REPAYMENT_TERMS_AUTOYES',
			'type' => 'bool',
			'massupdate' => 0,
			'comments' => '',
			'help' => '',
			'importable' => 'true',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => '0',
			'audited' => true,
			'reportable' => true,
			'enable_range_search' => false,
			'disable_num_format' => '1',
			'default' => '0',
		),
		'fix_cost' =>
		array (
			'required' => false,
			'name' => 'fix_cost',
			'vname' => 'LBL_FIX_COST',
			'type' => 'currency',
			'massupdate' => 0,
			'comments' => '',
			'help' => '',
			'importable' => 'true',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => '0',
			'audited' => true,
			'reportable' => true,
			'enable_range_search' => false,
			'disable_num_format' => '1',
		),
		'time_hour_cost' =>
		array (
			'required' => false,
			'name' => 'time_hour_cost',
			'vname' => 'LBL_TIME_HOUR_COST',
			'type' => 'currency',
			'massupdate' => 0,
			'comments' => '',
			'help' => '',
			'importable' => 'true',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => '0',
			'audited' => true,
			'reportable' => true,
			'enable_range_search' => false,
			'disable_num_format' => '1',
		),
		'cost_approval' =>
		array (
			'required' => false,
			'name' => 'cost_approval',
			'vname' => 'LBL_COST_APPROVAL',
			'type' => 'bool',
			'massupdate' => 0,
			'comments' => '',
			'help' => '',
			'importable' => 'true',
			'duplicate_merge' => 'disabled',
			'duplicate_merge_dom_value' => '0',
			'audited' => true,
			'reportable' => true,
			'enable_range_search' => false,
			'disable_num_format' => '1',
			'default' => '0',
		),
		'date_finish_plan' =>
		array (
			'name' => 'date_finish_plan',
			'vname' => 'LBL_DATE_FINISH_PLAN',
			'type' => 'date',
			'audited'=>true,
			'comment' => '',
			'importable' => 'required',
			'required' => false,
			'enable_range_search' => true,
			'options' => 'date_range_search_dom',
		),
		'date_finish_fact' =>
		array (
			'name' => 'date_finish_fact',
			'vname' => 'LBL_DATE_FINISH_FACT',
			'type' => 'date',
			'audited'=>true,
			'comment' => '',
			'importable' => 'required',
			'required' => false,
			'enable_range_search' => true,
			'options' => 'date_range_search_dom',
		),

),
	'relationships'=>array (
),
	'optimistic_locking'=>true,
		'unified_search'=>true,
	);
if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('lm_TechnicalSupport','lm_TechnicalSupport', array('basic','assignable'));