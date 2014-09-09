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
 
require_once('include/Sugarpdf/sugarpdf/sugarpdf.smarty.php');
 
class SugarpdfSynopdfview extends SugarpdfSmarty{

    function preDisplay(){
        parent::preDisplay();

        if (!empty($_REQUEST['pdf_template_id'])) {
            $this->templateLocation = $this->making_template_to_tpl($_REQUEST['pdf_template_id']);
        }        

        require_once('include/DetailView/DetailView2.php');
		$tmp_dv = new DetailView2();
        $tmp_dv->showVCRControl = false;
		$tmp_dv->setup($this->module, $this->bean);
        $tmp_dv->process();

        $this->ss->assign('fields', $tmp_dv->fieldDefs);
 
    }

    private function making_template_to_tpl($syno_pdftemplate_id) {
        $syno_pdf_template = new SYNO_Pdf_templates();
        $syno_pdf_template->disable_row_level_security = true;

        if ($syno_pdf_template->retrieve($syno_pdftemplate_id) !== null) {
            
            if ( ! file_exists($GLOBALS['sugar_config']['cache_dir'] . 'modules/SYNO_Pdf_templates/tpls') ) { 
                mkdir_recursive($GLOBALS['sugar_config']['cache_dir'] . 'modules/SYNO_Pdf_templates/tpls'); 
            }
            $tpl_filename = $GLOBALS['sugar_config']['cache_dir'] . 'modules/SYNO_Pdf_templates/tpls/' . $syno_pdftemplate_id . '.tpl';
            sugar_file_put_contents($tpl_filename, from_html($syno_pdf_template->body_html));

            return $tpl_filename;
        }

        return '';        
    }

}

?>