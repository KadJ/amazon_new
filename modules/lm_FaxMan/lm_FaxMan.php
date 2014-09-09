<?PHP
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
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once('modules/lm_FaxMan/lm_FaxMan_sugar.php');
class lm_FaxMan extends lm_FaxMan_sugar {

    function lm_FaxMan(){
        parent::lm_FaxMan_sugar();
    }


    public function sendFax($fax_number, $file) {
        global $sugar_config;
        $json = new JSON();
        $site_id = 'wutPSUQDE21UTBEs';
        $secret_key = 'MKUTxP5BxJM2h73gkFmnNbyG8kSIlG1i';

        // Предварительная обработка номера факса
        $fax_number = preg_replace("|[\(\)\- \+]|is", "", $fax_number);
        $fax_number = preg_replace("|^7|is", "8", $fax_number);
        $fax_number = substr($fax_number, 0, 1) . '-' . substr($fax_number, 1, 3) . '-' . substr($fax_number, 4, strlen($fax_number)-4);

        // Основной адрес
        $url = 'http://fax-net.spb.ru/API/faxAPI.php?';

        // Запрос авторизации
        $request_array = array(
            'a=askLogin',
            'site_id=' . $site_id,
        );

        $request = $url . implode("&", $request_array);
        $content = file_get_contents($request);
        $content = $json->decode($content);

        print_array("Запрос авторизации:");
        print_array($request);
        print_array("Ответ:");
        print_array($content);

        if(isset($content['rd_hash'])) {
            // Если пришел хеш для кодирования
            $rd_hash = $content['rd_hash'];

            // Получаем идентификационный хеш
            $rt_hash=sha1($secret_key.$rd_hash.$site_id);

            // Авторизация
            $request_array = array(
                'a=login',
                'site_id=' . $site_id,
                'rt_hash=' . $rt_hash,
            );
            $request = $url . implode("&", $request_array);
            $content = file_get_contents($request);
            $content = $json->decode($content);

            print_array("Запрос авторизации:");
            print_array($request);
            print_array("Ответ:");
            print_array($content);

            if(isset($content['token'])) {
                // Если пришел token
                $token = $content['token'];

                // Полный HTTP-путь до файла с факсом
                $http_url = $sugar_config['site_url'] . '/' . $file;
                print_array('Полный HTTP-путь до файла с факсом: ' . $http_url);

                // Устанавливаем факс на отправку
                $request_array = array(
                    'a=sendFax',
                    'token=' . $token,
                    'document=' . urlencode($http_url),
                    'nummer_fax=' . $fax_number,
                );
                $request = $url . implode("&", $request_array);
                $content = file_get_contents($request);
                $content = $json->decode($content);

                print_array("Запрос авторизации:");
                print_array($request);
                print_array("Ответ:");
                print_array($content);


            }

        }


    }

    public function sendFaxToEmail($fax_number, $file) {

        include_once "include/Lemars/SendEmail.php";

        print_array('$fax_number 1');
        print_array($fax_number);

        // Предварительная обработка номера факса
        $fax_number = preg_replace("|[\(\)\- \+]|is", "", $fax_number);
        $fax_number = preg_replace("|^7|is", "8", $fax_number);
        $fax_number = substr($fax_number, 0, 1) . '-' . substr($fax_number, 1, 3) . '-' . substr($fax_number, 4, strlen($fax_number)-4);

        print_array('$fax_number 2');
        print_array($fax_number);

        print_array('$file:');
        print_array($file);
        print_array(pathinfo($file));
        $pathinfo = pathinfo($file);

        // Отправляем файл на почту
        $mail = new Lemars_Email_SendEmail();
        $mail->setEmails(array('uspensky@lemars.ru'));
        $subject = 'lemars ' . $fax_number;
        $mail->setSubject($subject);

        $body = 'Hi!';
        $mail->setBody($body);



        //$mail->addAttachment($file, $pathinfo['filename']);

        print_array($mail->send());




    }

    /*
     * Отправка факса через собственный факс-сервер Avanta
     */
    public function sendFaxAvanta($fax_number, $file) {

        print_array('$fax_number');
        print_array($fax_number);

        // Предварительная обработка номера факса
        $fax_number = preg_replace("|[\(\)\- ]|is", "", $fax_number);

        print_array('$fax_number');
        print_array($fax_number);
        // Полный путь до файла
        $file = realpath(dirname(__FILE__)) . '/../../' . $file;
        $file = realpath($file);
        $file = str_replace("\\", "/", $file);
        $file = str_replace(" ", "\ ", $file);

        // POST-переменные для отправки
        $post_array = array(
            'fromCRM' => 'true',
            'fromCRMPass' => 'le!mars!egovexpert!crm',
            'FAX_username' => 'maint',
            'FAX_password' => 'mak1mozer',

            'MAX_FILE_SIZE' => '104857600',
            'destinations' => $fax_number,
            'notify_requeue' => '1',
            'sendtimeHour' => '00',
            'sendtimeMin' => '00',
            'killtime' => '',
            'killtime_unit' => '',
            'numtries' => '',
            'user_tsi' => '',
            'priority' => '*',
            'modem' => 'any',
            //'coverpage' => '1',
            //'whichcover' => 'cover-letter.ps',
            //'to_person' => '',
            //'to_company' => '',
            //'to_location' => '',
            //'to_voicenumber' => '',
            //'regarding' => '',
            //'comments' => '',
            '_submit_check' => '1',
            'file_0' => '@' . $file,
        );

        //print_array($post_array);

        // Формируем запрос
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://176.192.58.244/avantfax/sendfax.php');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //Нужно явно указать, что будет POST запрос
        curl_setopt($ch, CURLOPT_POST, true);
        //Здесь передаются значения переменных
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_USERAGENT, 'SugarCRM');

        $data = curl_exec($ch);
        curl_close($ch);
    }
}
?>