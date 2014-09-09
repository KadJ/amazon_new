<?php

/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Public License Version
 * 1.1.3 ("License"); You may not use this file except in compliance with the
 * License. You may obtain a copy of the License at http://www.sugarcrm.com/SPL
 * Software distributed under the License is distributed on an "AS IS" basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied.  See the License
 * for the specific language governing rights and limitations under the
 * License.
 * All copies of the Covered Code must include on each user interface screen:
 *    (i) the "Powered by SugarCRM" logo and
 *    (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2006 SugarCRM, Inc.; All Rights Reserved.
 *
 * Portions created by SYNOLIA are Copyright (C) 2004-2010 SYNOLIA. You do not
 * have the right to remove SYNOLIA copyrights from the source code or user
 * interface.
 *
 * All Rights Reserved. For more information and to sublicense, resell,rent,
 * lease, redistribute, assign or otherwise transfer Your rights to the Software
 * contact SYNOLIA at contact@synolia.com
***********************************************************************************/
/**********************************************************************************
 * The Original Code is:    SYNOPDFMANAGER by SYNOLIA
 *                          www.synolia.com - sugar@synolia.com
 * Contributor(s):          ______________________________________.
 * Description :            ______________________________________.
 **********************************************************************************/

$dictionary['SYNO_Pdf_templates'] = array(
    'table'=>'syno_pdf_templates',
    'unified_search' => false,
    'audited' => true,
    'fields' => array (
        'published' => 
        array (
            'required' => '1',
            'name' => 'published',
            'vname' => 'LBL_PUBLISHED',
            'type' => 'enum',
            'massupdate' => 0,
            'default' => 'no',
            'comments' => '',
            'help' => '',
            'importable' => 'false',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => 1,
            'reportable' => 0,
            'len' => 100,
            'options' => 'SYNO_GLO_YES_NO',
            'studio' => 'visible',
            'dependency' => false,
        ),
        'base_module' => 
        array (
            'required' => '1',
            'name' => 'base_module',
            'vname' => 'LBL_BASE_MODULE',
            'type' => 'enum',
            'function' => 'get_base_module_dropdown',
            'massupdate' => 0,
            'default' => '',
            'comments' => '',
            'help' => '',
            'importable' => 'false',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => 1,
            'reportable' => 0,
            'len' => 100,
            //'options' => 'moduleList',
            'studio' => 'visible',
            'dependency' => false,
        ),
        'body_html' => 
        array (
            'required' => false,
            'name' => 'body_html',
            'vname' => 'LBL_BODY_HTML',
            'type' => 'text',
            'massupdate' => 0,
            'comments' => '',
            'help' => '',
            'importable' => 'false',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => 1,
            'reportable' => 0,
            'studio' => 'visible',
        ),
    ),
	'relationships'=>array (
    ),
	'optimistic_lock'=>true,
);
if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('SYNO_Pdf_templates','SYNO_Pdf_templates', array('basic','assignable'));