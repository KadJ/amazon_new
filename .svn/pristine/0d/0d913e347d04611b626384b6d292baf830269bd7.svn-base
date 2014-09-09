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

/*********************************************************************************

 * Description: Schedules email for delivery. emailman table holds emails for delivery.
 * A cron job polls the emailman table and delivers emails when intended send date time is reached.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

require_once('modules/AOS_PDF_Templates/PDF_Lib/mpdf.php');
require_once('modules/AOS_PDF_Templates/templateParser.php');
require_once('modules/AOS_PDF_Templates/sendEmail.php');
require_once('modules/AOS_PDF_Templates/AOS_PDF_Templates.php');

global $db;
global $current_user;
global $sugar_config;
global $beanList;


/**
 * Формирование рассылки факсов - постановка в очередь
 */

$start_email_outbound_conter = isset($_REQUEST['start_email_outbound_conter']) ? $_REQUEST['start_email_outbound_conter'] : 1;

$seedCampaign = new Campaign();
$seedCampaign->retrieve($_REQUEST['record']);
if(!empty($seedCampaign->id)) {
    // Если Компания нормально нашлась

    if($seedCampaign->aos_pdf_templates_id_c != $_REQUEST['aos_pdf_templates_id_c']) {
        // Если PDF-шаблон отличается
        // Записываем в компании новый PDF-шаблон
        $seedCampaign->aos_pdf_templates_id_c = $_REQUEST['aos_pdf_templates_id_c'];
        $seedCampaign->save();
        $seedCampaign->retrieve($seedCampaign->id);
    }

    // Получаем список адресатов для Компании
    $sql = "
            SELECT
                `prospect_lists`.`id`
            FROM
              `prospect_lists`
            INNER JOIN
              `prospect_list_campaigns`
              ON `prospect_list_campaigns`.`prospect_list_id` = `prospect_lists`.`id` AND `prospect_list_campaigns`.`deleted` = 0
            WHERE
              `prospect_list_campaigns`.`campaign_id` = '{$seedCampaign->id}'
              AND
              `prospect_lists`.`deleted` = 0
    ";
    $result = $db->query($sql, true);
    while($row = $db->fetchByAssoc($result)) {
        // Пробегаемся по всем найденным спискам рассылки

        // Получаем записи в списке
        $sql = ProspectList::create_export_members_query($row['id']);
        $result_list = $db->query($sql, true);
        while($row_list = $db->fetchByAssoc($result_list)) {
            // Пробегаемя по каждой найденной записи

            // Получаем запись, по которой пойдет рассылка
            $bean_name = $beanList[$row_list['related_type']];
            $seedBean = new $bean_name;
            $seedBean->retrieve($row_list['id']);

            if(!empty($seedBean->id)) {
                // Если все нормально проинициировалось

                // Блок подмены Контрагента его Контактом
                if($seedBean->module_dir == 'Accounts') {
                    // Если текущий получатель - Контрагент

                    // Ищем все Контакты текущего Контрагента
                    $contacts = $seedBean->get_contacts();
                    if(count($contacts)) {
                        foreach($contacts as $seedContact) {
                            if(!empty($seedContact->fio_assign_c) AND $seedContact->fio_assign_c != '') {
                                // Если у Контакта указано ФИО в дательном
                                // На его имя будет отправлен факс
                                $seedAccount = $seedBean;
                                $seedBean = $seedContact;

                                // Проверяем наличие факса
                                if(!$seedContact->phone_fax AND $seedAccount->phone_fax) {
                                    // Если у контакта нет факса, а у его контрагента - есть
                                    // Применяем факс контрагента
                                    $seedBean->phone_fax = $seedAccount->phone_fax;
                                    $seedBean->save();
                                    $seedBean->retrieve($seedBean->id);
                                }
                            }
                        }
                    }
                }

                // Проверка на наличие факса
                if(empty($seedBean->phone_fax) OR $seedBean->phone_fax == '') {
                    // Если факса нет - пропуск
                    continue;
                }

                // Формируем задачу на рассылку
                $seedFaxMan = new lm_FaxMan();
                $seedFaxMan->document_name = $seedCampaign->name . ": " . $seedBean->name;
                $seedFaxMan->status_id = 'in_queue'; // Ставим в очередь на отправку
                $seedFaxMan->campaign_id_c = $seedCampaign->id; // Указываем маркетинговую компанию
                $seedFaxMan->parent_type = $seedBean->module_dir;
                $seedFaxMan->parent_id = $seedBean->id;
                $seedFaxMan->assigned_user_id = $current_user->id;
                $seedFaxMan->save();
                $seedFaxMan->retrieve($seedFaxMan->id);

                // Формируем файл с PDF-документом

                if($seedCampaign->aos_pdf_templates_id_c) {
                    // Если указан PDF-шаблон прикрепляемого документа
                    $seedPDFTemplate = new AOS_PDF_Templates();
                    $seedPDFTemplate->retrieve($seedCampaign->aos_pdf_templates_id_c);

                    $object_arr = array();

                    $object_arr[$seedBean->module_dir] = $seedBean->id;


                    $search = array ('@<script[^>]*?>.*?</script>@si', 		// Strip out javascript
                        '@<[\/\!]*?[^<>]*?>@si',		// Strip out HTML tags
                        '@([\r\n])[\s]+@',			// Strip out white space
                        '@&(quot|#34);@i',			// Replace HTML entities
                        '@&(amp|#38);@i',
                        '@&(lt|#60);@i',
                        '@&(gt|#62);@i',
                        '@&(nbsp|#160);@i',
                        '@&(iexcl|#161);@i',
                        '@&#(\d+);@e',
                        '@<address[^>]*?>@si'
                    );

                    $replace = array ('',
                        '',
                        '\1',
                        '"',
                        '&',
                        '<',
                        '>',
                        ' ',
                        chr(161),
                        'chr(\1)',
                        '<br>'
                    );



                    $header = preg_replace($search, $replace, $seedPDFTemplate->pdfheader);
                    $footer = preg_replace($search, $replace, $seedPDFTemplate->pdffooter);
                    $text = preg_replace($search, $replace, $seedPDFTemplate->description);
                    $text = preg_replace('/\{DATE\s+(.*?)\}/e',"date('\\1')",$text );

                    // Подстановка "Уважаемый (-ая)"

                    if($seedBean->module_dir == 'Contacts') {
                        switch($seedBean->salutation) {
                            case 'male':
                                $text = str_replace('$contact_dear', 'Уважаемый', $text);
                                break;
                            case 'female':
                                $text = str_replace('$contact_dear', 'Уважаемая', $text);
                                break;
                            case '':
                                $text = str_replace('$contact_dear', '', $text);
                                break;
                        }
                    }

                    // Подстановка даты
                    $text = str_replace('$current_date', date("d") . " " . $timedate->getMonthString(time(), '2') . ' ' . date("Y") . " года", $text);



                    $text = str_replace('$email_counter', $start_email_outbound_conter, $text);
                    $start_email_outbound_conter++;

                    $converted = templateParser::parse_template($text, $object_arr);
                    $header = templateParser::parse_template($header, $object_arr);
                    $footer = templateParser::parse_template($footer, $object_arr);

                    $printable = str_replace("\n","<br />",$converted);

                    ob_clean();
                    try{
                        // Создаем файл с PDF
                        $seedFaxMan->filename = $seedPDFTemplate->name . '.pdf';
                        $seedFaxMan->file_ext = 'pdf';
                        $seedFaxMan->file_mime_type = 'application/pdf';
                        $seedFaxMan->save();

                        $pdf=new mPDF('en','A4','','DejaVuSansCondensed',$seedPDFTemplate->margin_left,$seedPDFTemplate->margin_right,$seedPDFTemplate->margin_top,$seedPDFTemplate->margin_bottom,$seedPDFTemplate->margin_header,$seedPDFTemplate->margin_footer);
                        $pdf->setAutoFont();
                        $pdf->SetHTMLHeader($header);
                        $pdf->SetHTMLFooter($footer);
                        $pdf->writeHTML($printable);
                        $fp = fopen($sugar_config['upload_dir'] . 'attachfile.pdf','wb');
                        fclose($fp);
                        $pdf->Output($sugar_config['upload_dir'] . $seedFaxMan->id,'F');
                    }catch(mPDF_exception $e){
                        echo $e;
                    }

                }
            }
        }
    }
    // Возвращаем обратно
    $url = "index.php?module=Campaigns&action=WizardHome&record=" . $seedCampaign->id;
    header("Location: " . $url);
    exit;
}
