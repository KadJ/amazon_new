<?php
/*********************************************************************************
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
 ********************************************************************************/
$dictionary['PhoneCall'] = array(
	'table' => 'phonecalls',
	
	'audited' => true,
	
	'fields' => array (
		'direction' => array (
			'name'		=> 'direction',
			'vname'		=> 'LBL_DIRECTION',
			'type'		=> 'enum',
			'options'	=> 'phonecalls_direction_list',
			'required'	=> false,
			'audited'	=> false,
			'importable'=> 'false',
			'massupdate'=> false,
			'duplicate_merge' => 'disabled',
		),
		'phone_master' => array (
			'name'		=> 'phone_master',
			'vname'		=> 'LBL_PHONE_MASTER',
			'type'		=> 'phone',
			'dbType'	=> 'varchar',
			'len'		=> '32',
			'required'	=> false,
			'audited'	=> false,
			'importable'=> 'false',
			'massupdate'=> false,
			'duplicate_merge' => 'disabled',
		),
		'phone_slave' => array (
			'name'		=> 'phone_slave',
			'vname'		=> 'LBL_PHONE_SLAVE',
			'type'		=> 'phone',
			'dbType'	=> 'varchar',
			'len'		=> '32',
			'required'	=> false,
			'audited'	=> false,
			'importable'=> 'false',
			'massupdate'=> false,
			'duplicate_merge' => 'disabled',
		),
		'phone' => array (
			'name'		=> 'phone',
			'vname'		=> 'LBL_PHONE',
			'type'		=> 'phone',
			'source'	=> 'non-db',
			'required'	=> false,
			'audited'	=> false,
			'importable'=> 'false',
			'massupdate'=> false,
			'duplicate_merge' => 'disabled',
		),
		'status' => array (
			'name'		=> 'status',
			'vname'		=> 'LBL_STATUS',
			'type'		=> 'enum',
			'options'	=> 'phonecalls_status_list',
			'required'	=> false,
			'audited'	=> false,
			'importable'=> 'false',
			'massupdate'=> false,
			'duplicate_merge' => 'disabled',
		),
		'online' => array (
			'name'		=> 'online',
			'vname'		=> 'LBL_ONLINE',
			'type'		=> 'bool',
			'default'	=> false,
			'required'	=> false,
			'audited'	=> false,
			'importable'=> 'false',
			'massupdate'=> false,
			'duplicate_merge' => 'disabled',
		),
		'parent_type' => array (
			'name'		=> 'parent_type',
			'vname'		=> 'LBL_PARENT_TYPE',
			'type'		=> 'parent_type',
			'dbType'	=> 'varchar',
			'len'		=> 25,
			'group'		=> 'parent_name',
			'required'	=> false,
			'audited'	=> false,
			'importable'=> 'false',
			'massupdate'=> false,
			'duplicate_merge' => 'disabled',
		),
		'parent_id' => array (
			'name'		=> 'parent_id',
			'vname'		=> 'LBL_PARENT_ID',
			'type'		=> 'id',
			'required'	=> false,
			'audited'	=> false,
			'importable'=> 'false',
			'massupdate'=> false,
			'duplicate_merge' => 'disabled',
		),
		'parent_name' => array(
			'name'		=> 'parent_name',
			'vname'		=> 'LBL_RELATED_TO',
			'type'		=> 'parent',
			'type_name'	=> 'parent_type',
			'id_name'	=> 'parent_id',
			'source'	=> 'non-db',
			'options'	=> 'moduleList',
			'required'	=> false,
			'audited'	=> false,
			'importable'=> 'false',
			'massupdate'=> false,
			'duplicate_merge' => 'disabled',
		),
		'talk_start' => array (
			'name'		=> 'talk_start',
			'vname'		=> 'LBL_TALK_START',
			'type'		=> 'datetime',
			'comment'	=> 'Time of call begins',
			'required'	=> false,
			'audited'	=> false,
			'importable'=> 'false',
			'massupdate'=> false,
		),
		'talk_duration' => array (
			'name'		=> 'talk_duration',
			'vname'		=> 'LBL_TALK_DURATION',
			'type'		=> 'varchar',
			'len'		=> 11,
			'default'	=> 0,
			'comment'	=> 'Duration of talk',
			'required'	=> true,
			'audited'	=> false,
			'importable'=> 'false',
			'massupdate'=> false,
		),
		'online_duration' => array (
			'name'		=> 'online_duration',
			'vname'		=> 'LBL_ONLINE_DURATION',
			'type'		=> 'int',
			'len'		=> 11,
			'default'	=> 0,
			'comment'	=> 'Duration of line connection',
			'required'	=> true,
			'audited'	=> false,
			'importable'=> 'false',
			'massupdate'=> false,
		),
		'file_url' => array (
			'name'		=> 'file_url',
			'vname'		=> 'LBL_FILE_URL',
			'type'		=> 'varchar',
			'len'		=> 255,
			'comment'	=> 'URL of call audio record',
			'required'	=> false,
			'audited'	=> false,
			'importable'=> 'false',
			'massupdate'=> false,
		),
		'file_link' => array (
			'name'		=> 'file_link',
			'vname'		=> 'LBL_FILE_LINK',
			'type'		=> 'varchar',
			'source'	=> 'non-db',
			'comment'	=> 'Link to call audio record',
			'required'	=> false,
			'audited'	=> false,
			'importable'=> 'false',
			'massupdate'=> false,
		),
	),
	
	'relationships' => array (
	),
	
	'indices' => array (
		array (
			'name' => 'idx_date_entered',
			'type' => 'index',
			'fields' => array (
				'date_entered',
				'online'
			),
		),
		array (
			'name' => 'idx_direction',
			'type' => 'index',
			'fields' => array (
				'direction',
			),
		),
		array (
			'name' => 'idx_phone_master',
			'type' => 'index',
			'fields' => array (
				'phone_master',
			),
		),
		array (
			'name' => 'idx_phone_slave',
			'type' => 'index',
			'fields' => array (
				'phone_slave',
			),
		),
		array (
			'name' => 'idx_parent',
			'type' => 'index',
			'fields' => array (
				'parent_type',
				'parent_id',
			),
		),
		array (
			'name' => 'idx_online',
			'type' => 'index',
			'fields' => array (
				'online',
			),
		),
		array (
			'name' => 'idx_status',
			'type' => 'index',
			'fields' => array (
				'status',
			),
		),
	),
	'optimistic_lock' => true,
);

VardefManager::createVardef('PhoneCalls','PhoneCall', array('basic', 'assignable'));