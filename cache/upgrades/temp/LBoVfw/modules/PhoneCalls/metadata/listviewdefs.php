<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
 * SugarCRM is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004 - 2009 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 */
$listViewDefs['PhoneCalls'] = array(
	'DATE_ENTERED' => array (
		'name'	=> 'date_entered',
 		'label'	=> 'LBL_TALK_START_LIST',
		'width'	=> '20',
		'link'	=> true,
		'default'	=> true,
	),
 	'TALK_DURATION' => array (
 		'name'	=> 'talk_duration',
 		'label'	=> 'LBL_TALK_DURATION_LIST',
 		'width'	=> '10',
 		'default'	=> true,
 		'type' => 'varchar',
 	),
	'DIRECTION' => array (
		'name'	=> 'direction',
		'label'	=> 'LBL_DIRECTION',
		'width'	=> '10',
		'default'	=> true,
	),
	'STATUS' => array (
		'name'	=> 'status',
		'label'	=> 'LBL_STATUS',
		'width'	=> '10',
		'default'	=> true,
	),
	'PHONE_MASTER' => array (
		'name'	=> 'phone_master',
		'label'	=> 'LBL_PHONE_MASTER',
		'width'	=> '10',
		'default'	=> true,
	),
	'PHONE_SLAVE' => array (
		'name'	=> 'phone_slave',
		'label'	=> 'LBL_PHONE_SLAVE',
		'width'	=> '10',
		'default'	=> true,
	),
	'FILE_LINK' => array (
 		'name'	=> 'file_link',
 		'label'	=> 'LBL_FILE_LINK_LIST',
 		'width'	=> '20',
 		'default'	=> true,
 		'related_fields' => array (
 			'file_url'
 		),
 		'sortable' => false,
 	),
	'ASSIGNED_USER_NAME' => array (
		'name'	=> 'assigned_user_name',
		'label'	=> 'LBL_ASSIGNED_TO_NAME',
		'width'	=> '20',
		'default'	=> true,
	),
);