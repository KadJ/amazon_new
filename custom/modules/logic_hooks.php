<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['after_ui_frame'] = Array(); 
$hook_array['after_ui_frame'][] = Array(11, 'Adds asterisk related javascript to page to enable Click To Dial/Logging', 'custom/modules/Asterisk/include/AsteriskJS.php','AsteriskJS', 'echoJavaScript'); 
$hook_array['after_ui_frame'][] = Array(2, 'includeJS', 'modules/SYNO_Pdf_templates/SYNO_Pdf_templates_loadJS.php','SYNO_Pdf_templates_loadJS', 'includeJS'); 
$hook_array['after_ui_footer'] = Array(); 
$hook_array['after_ui_footer'][] = Array(1, 'after_ui_footer insert All-In-One-CTI js', 'custom/include/CTI/MainHook.php','CTI_MainHook', 'displayJavascript'); 



?>