<?php
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2011 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/


// THIS CONTENT IS GENERATED BY MBPackage.php
$manifest = array (
  0 => 
  array (
    'acceptable_sugar_versions' => 
    array (
      0 => '',
    ),
  ),
  1 => 
  array (
    'acceptable_sugar_flavors' => 
    array (
      0 => 'CE',
      1 => 'PRO',
      2 => 'ENT',
    ),
  ),
  'readme' => 'Русскоязычная служба технической поддежки SugarCRM
Модуль тестировался на SugarCRM CE 6.2.0, SugarCRM CE 6.2.4, SugarCRM CE 6.3.0, SugarCRM CE 6.3.1, SugarCRM CE 6.4.0, SugarCRM CE 6.4.1
По всем вопросам, связанным с установкой и работой модуля, обращаться по телефонам:
8 800 555-06-28 (звонок бесплатный)
+7 (495) 646-06-27
+7 (910) 908-21-23 (сотовый, МТС)
а также:
skype: evgenjekson
icq: 195938768
info@lemars.ru',
  'key' => 'lm',
  'author' => 'lemars.ru',
  'description' => 'Техническая поддержка SugarCRM на русском языке',
  'icon' => '',
  'is_uninstallable' => true,
  'name' => 'TechnicalSupport',
  'published_date' => '2012-03-08 16:17:13',
  'type' => 'module',
  'version' => 'v2.0.1',
  'remove_tables' => 'prompt',
);


$installdefs = array (
  'id' => 'TechnicalSupport',
  'beans' => 
  array (
    0 => 
    array (
      'module' => 'lm_TechnicalSupport',
      'class' => 'lm_TechnicalSupport',
      'path' => 'modules/lm_TechnicalSupport/lm_TechnicalSupport.php',
      'tab' => true,
    ),
  ),
  'layoutdefs' => 
  array (
  ),
  'relationships' => 
  array (
  ),
  'image_dir' => '<basepath>/icons',
  'copy' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/modules/lm_TechnicalSupport',
      'to' => 'modules/lm_TechnicalSupport',
    ),
    1 => 
    array (
      'from' => '<basepath>/SugarModules/dc',
      'to' => '.',
    ),
  ),
  'language' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/language/application/en_us.lang.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),
    1 => 
    array (
      'from' => '<basepath>/SugarModules/language/application/ru_ru.lang.php',
      'to_module' => 'application',
      'language' => 'ru_ru',
    ),
  ),
  'post_execute' => array(
  	0 => '<basepath>/install/post_execute.php',
  ),
  'post_uninstall' => array(
  	0 => '<basepath>/install/post_uninstall.php',
  ),
);
