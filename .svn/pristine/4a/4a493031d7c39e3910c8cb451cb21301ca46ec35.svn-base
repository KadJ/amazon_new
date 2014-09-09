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

    if (!empty($_REQUEST['base_module']) && !empty($_REQUEST['base_id'])) {
        $db = DBManagerFactory::getInstance();

        $base_module = $db->quote($_REQUEST['base_module']);;

        $syno_pdf_template = new SYNO_Pdf_templates();
        $syno_pdf_template->disable_row_level_security = true;
        
        $listing_result = $syno_pdf_template->get_list('name ASC', ' published=\'yes\' AND base_module=\'' . $base_module . '\'');

        if ($listing_result['row_count'] > 0) {
            $html_pdf_template = '';
            if ($listing_result['row_count'] > 1) {
                $html_pdf_template .= '<select name="pdf_template_id">';
                foreach ($listing_result['list'] as $list_item) {
                    $html_pdf_template .= '<option value="' . $list_item->id . '">' . $list_item->name . '</option>';
                }
                $html_pdf_template .= '</select>';
            } else {
                $html_pdf_template .= '<input type="hidden" name="pdf_template_id" value="' . $listing_result['list'][0]->id . '">';                
            }

            $html_form = '';
            $html_form .= '<form action="index.php" method="POST" name="ViewPDF" id="form">';
            $html_form .= '<input type="hidden" name="module" value="' . $_REQUEST['base_module'] . '">';
            $html_form .= '<input type="hidden" name="record" value="' . $_REQUEST['base_id'] . '">';
            $html_form .= '<input type="hidden" name="action" value="sugarpdf">';
            $html_form .= '<input type="hidden" name="sugarpdf" value="synopdfview">';
            $html_form .= $html_pdf_template;
            $html_form .= '<input title="PDF !!" class="button" type="submit" name="button" value="' . translate('SYNO_PDF_TEMPLATES_BUTTON') . '">';
            $html_form .= '</form>';

            echo $html_form;
        }
    }
     
    echo '';
    exit;
?>