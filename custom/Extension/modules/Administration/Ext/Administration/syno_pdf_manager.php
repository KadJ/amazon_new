<?php
/**********************************************************************************
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
 * Portions created by SYNOLIA are Copyright (C) 2004-2007 SYNOLIA. You do not
 * have the right to remove SYNOLIA copyrights from the source code or user
 * interface.
 *
 * All Rights Reserved. For more information and to sublicense, resell,rent,
 * lease, redistribute, assign or otherwise transfer Your rights to the Software
 * contact SYNOLIA at contact@synolia.com
***********************************************************************************/
/**********************************************************************************
 * $Header:$
 * The Original Code is:     Integration by SYNOLIA
 *                          www.synolia.com - sugar@synolia.com
 * Contributor(s):          ______________________________________.
 * Description :            ______________________________________.
 **********************************************************************************/
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$synolia_plugins_installed = 0;
foreach($admin_group_header as $k => $v){
    if(!empty($v) && is_array($v)){
        if($v[0] == 'LBL_SYNOLIA'){
            $synolia_plugins_installed = $k;
        }
    }
}
if( empty($synolia_plugins_installed) ) {
    $admin_option_defs = array ();
    $admin_option_defs[] = array (
       'SYNO_Pdf_templates',
       'LBL_SYNO_PDF_TEMPLATES_TITLE',
       'LBL_SYNO_PDF_TEMPLATES_PARAM',
       './index.php?module=SYNO_Pdf_templates&action=index'
    );    
    $admin_group_header[] = array (
        'LBL_SYNOLIA',
        '',
        false,
        array("Administration" => $admin_option_defs),
        'LBL_SYNOLIA_ADMIN_DESC'
    );
} else {
    $admin_group_header[$synolia_plugins_installed][3]['Administration'][] = array (
        'SYNO_Pdf_templates',
        'LBL_SYNO_PDF_TEMPLATES_TITLE',
        'LBL_SYNO_PDF_TEMPLATES_PARAM',
        './index.php?module=SYNO_Pdf_templates&action=index'
    );
}

?>