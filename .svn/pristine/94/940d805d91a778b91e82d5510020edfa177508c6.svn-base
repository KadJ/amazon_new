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

$module_name = 'SYNO_Pdf_templates';
$viewdefs[$module_name]['EditView'] = array(
    'templateMeta' => array(
                        'form' => array(
                            'footerTpl' => 'modules/SYNO_Pdf_templates/tpls/EditViewFooter.tpl'
                        ),
                        'maxColumns' => '2', 
                        'widths' => array(
                                            array('label' => '10', 'field' => '30'), 
                                            array('label' => '10', 'field' => '30')
                                            ),                                                                                                                          
                        'includes' => array (
                            array (
                                'file' => 'modules/SYNO_Pdf_templates/js/syno_pdf_templates_edit.js',
                            ),
                        ),
    
                      ),
                        'panels' =>array (
                            'default' => array (
                                0 => array (
                                    0 => array (
                                        'name' => 'name',
                                        'label' => 'LBL_NAME',
                                    ),
                                    1 => array (
                                        'name' => 'published',
                                        'label' => 'LBL_PUBLISHED',
                                    ),
                                ),
                                1 => array (
                                    0 => array (
                                        'name' => 'base_module',
                                        'label' => 'LBL_BASE_MODULE',
                                        'displayParams' => 
                                        array (
                                            'required' => true,
                                            'field' => array (
                                                'onchange' => 'syno_pdf_templates_load_field()',
                                            ),
                                        ),
                                    ),
                                    1 => array (
                                        'name' => 'base_module',
                                        'label' => 'LBL_BASE_MODULE_FIELDS',
                                        'customCode' => '<input type="hidden" name="hidden_previous_base_module" id="hidden_previous_base_module" value="{$fields.base_module.value}" /><span id="span_base_module_field" name="span_base_module_field"></span>',
                                    ),
                                ),
                                2 => array (
                                    0 => array (
                                        'name' => 'body_html',
                                        'label' => 'LBL_BODY_HTML',
                                    ),
                                ),
                                3 => array (
                                    0 => array (
                                        'name' => 'description',
                                        'label' => 'LBL_DESCRIPTION',
                                    ),
                                ),
                            ),                          
                        ),                       
);
?>
