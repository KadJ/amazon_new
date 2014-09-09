<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
/**
 * Subpanel Layout definition for default
 *
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
$module_name = 'PhoneCalls';
$subpanel_layout = array(
    'top_buttons' => array(),
    'where' => '',
    'list_fields' => array(
        'date_entered' => array(
            'name' => 'date_entered',
            'usage' => 'query_only',
        ),
        'talk_start' => array(
            'name' => 'talk_start',
            'vname' => 'LBL_TALK_START_LIST',
            'width' => '20%',
            'widget_class' => 'SubPanelDetailViewLink',
        ),
        'talk_duration' => array(
            'name' => 'talk_duration',
            'vname' => 'LBL_TALK_DURATION',
            'width' => '5%',
        ),
        'direction' => array(
            'name' => 'direction',
            'vname' => 'LBL_DIRECTION',
            'width' => '10%',
        ),
        'status' => array(
            'name' => 'status',
            'vname' => 'LBL_STATUS',
            'width' => '10%',
        ),
        'phone_master' => array(
            'name' => 'phone_master',
            'vname' => 'LBL_PHONE_MASTER',
            'sortable' => false,
            'width' => '10%',
        ),
        'phone_slave' => array(
            'name' => 'phone_slave',
            'vname' => 'LBL_PHONE_SLAVE',
            'width' => '10%',
            'sortable' => false,
        ),
        'file_url' => array(
            'name' => 'file_url',
            'usage' => 'query_only',
        ),
        'file_link' => array(
            'name' => 'file_link',
            'vname' => 'LBL_FILE_LINK_LIST',
            'width' => '20%',
            'sortable' => false,
        ),
        'assigned_user_name' => array(
            'name' => 'assigned_user_name',
            'vname' => 'LBL_ASSIGNED_TO_NAME',
            'width' => '20%',
        ),
    ),
);
