<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2012 SugarCRM Inc.
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


/**
 * Set up an array of Jobs with the appropriate metadata
 * 'jobName' => array (
 * 		'X' => 'name',
 * )
 * 'X' should be an increment of 1
 * 'name' should be the EXACT name of your function
 *
 * Your function should not be passed any parameters
 * Always  return a Boolean. If it does not the Job will not terminate itself
 * after completion, and the webserver will be forced to time-out that Job instance.
 * DO NOT USE sugar_cleanup(); in your function flow or includes.  this will
 * break Schedulers.  That function is called at the foot of cron.php
 */

/**
 * This array provides the Schedulers admin interface with values for its "Job"
 * dropdown menu.
 */
include_once "modules/lm_FaxMan/lm_FaxMan.php";


$job_strings[] = 'lmSendFax';

/**
 * Рассылка факсов
 */
function lmSendFax() {
    global $sugar_config;
    global $beanList;

    set_time_limit(0);

    print_array("Пришли в задачу lmSendFax");

    $seedFaxMan = new lm_FaxMan();

    // Получаем все задания, стоящие на отправке
    $faxmans = $seedFaxMan->get_full_list("", "`lm_faxman`.`status_id` = 'in_queue'");
    if(count($faxmans)) {
        foreach($faxmans as $seedFaxMan) {
            $seedFaxMan->retrieve($seedFaxMan->id);

            print_array("Отправляем факс: " . $seedFaxMan->name);

            // Получатель факса
            if(!empty($seedFaxMan->parent_id) AND !empty($seedFaxMan->parent_type)) {
                $class_name = $beanList[$seedFaxMan->parent_type];
                $seedBean = new $class_name;
                $seedBean->retrieve($seedFaxMan->parent_id);

                print_array("Получатель факса: " . $seedBean->name);

                // Проверка на наличие номера факса
                if(!empty($seedBean->phone_fax)) {
                    // Если факс указан у записи

                    // Проверяем наличие файла
                    $file = $sugar_config['upload_dir'] . $seedFaxMan->id;
                    if(file_exists($file)) {
                        // Временно копируем файл
                        $file_from = $file;
                        $file_to = $sugar_config['cache_dir'] . $seedFaxMan->filename;
                        $file_to = preg_replace("|\.".$seedFaxMan->file_ext."$|is", "", $file_to);
                        $file_to = str_replace(" ", "_", $file_to);
                        $file_to .= "_" . str_replace(" ", "_", microtime()) . "." . $seedFaxMan->file_ext;
                        copy($file_from, $file_to);

                        // Отправляем файл на факс-сервер
                        $seedFaxMan->sendFax($seedBean->phone_fax, $file_to);

                        // Удаляем временный файл
                        print_array("Удаляем временный файл");
                        print_array($file_to);
                        //unlink($file_to);

                        // Отмечаем факс отправленным
                        $seedFaxMan->status_id = "complete";
                        $seedFaxMan->save();
                        print_array('Отмечаем факс отправленным');
                        $seedFaxMan->retrieve($seedFaxMan->id);
                        print_array($seedFaxMan->status_id);
                        continue;
                    }
                }

            }

            // Отмечаем факс ошибочным
            $seedFaxMan->status_id = "error";
            $seedFaxMan->save();
        }
    }


    return true;
}