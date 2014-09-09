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

class SYNO_Pdf_templates_loadJS {

    /**
     * Inclusion d'un JS propre à SYNOLIA sur toutes les pages
     * Sauf les pages d'export, d'impression, le module builder et les pages sans module défini
     *
     * @param string $event -- What kind of logic_hook is it (after_ui_frame, after_ui_footer...)
     * @param string $arguments -- unused
     * @return unknown -- No return
     */
    function includeJS($event, $arguments){
        $GLOBALS['log']->debug('------------  '. __CLASS__ . '::' . __FUNCTION__ . ' BEGIN ------------');

        if( empty($_REQUEST['to_pdf']) && ( !empty($_REQUEST['module']) && $_REQUEST['module']!='ModuleBuilder') && empty($_REQUEST['to_csv']) && (empty($_REQUEST['action']) || $_REQUEST['action'] != 'modulelistmenu') ) {
            echo '<script type="text/javascript" src="modules/SYNO_Pdf_templates/js/syno_pdf_templates_load.js"></script>';
            $GLOBALS['log']->debug('includeJS: OK');
        }
        else {
            $GLOBALS['log']->debug('includeJS: KO');
        }

        $GLOBALS['log']->debug('------------ '. __CLASS__ . '::' . __FUNCTION__ . ' END ------------');
    }
}
?>
