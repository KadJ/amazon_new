<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

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

    if (!empty($_REQUEST['base_module'])) {
    	global $app_strings;
		include_once('include/VarDefHandler/VarDefHandler.php');

		$base_module = get_module_info($_REQUEST['base_module']);

		$base_module_vardef_handler = new VarDefHandler($base_module, 'template_filter');
        $base_module_vardef_handler->start_none = TRUE;
        $base_module_fields = $base_module_vardef_handler->get_vardef_array(TRUE);
        asort($base_module_fields);
        $html_fields_available = '';
        $html_fields_available .= '<select id="base_module_field" name="base_module_field">';
        $html_fields_available .= get_select_options_with_id($base_module_fields, '');
        $html_fields_available .= '</select>';

        $html_fields_available .= '<input title="' . $app_strings['LBL_SELECT_BUTTON_TITLE'] . '" accessKey="' . $app_strings['LBL_SELECT_BUTTON_KEY'] . '" type="button" class="button" value="' . $app_strings['LBL_SELECT_BUTTON_LABEL'] . '" name="button" onClick="javascript:insert_variable_html(YAHOO.util.Dom.get(\'base_module_field\').value);">';

        echo $html_fields_available;
    }
     
    echo '';
    exit;
?>