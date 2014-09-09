<?php
/**
 * Посыл email
 *
 * История:
 * 2011-12-20 Присоединение файла к письму.
 * 2011-12-14 Внесение в библиотеку. Впервые внедрен в sugarpro.local
 *
 */
class Lemars_Email_SendEmail
{
    protected $_emails = null;

    protected $_body = null;

    protected $_template = false;

    protected $_dataForTemplate = false;


    protected $_subject = false;

    protected $_attached = array();




    public function __construct()
    {

    }

    public function setEmails($value)
    {
        if (!is_array($value))
        {
            $value = array($value);
        }
        $this->_emails = $value;
        return $this;
    }


    public function setBody($value)
    {
        $this->_body = $value;
        return $this;
    }

    public function setSubject($value)
    {
        $this->_subject = $value;
        return $this;
    }

    public function setTemplate($file, $data = null)
    {

        //print_r($beanAccount->emailAddress->addresses);
        require_once 'include/Sugar_Smarty.php';
        $smarty = new Sugar_Smarty();

        global $sugar_config;
        //'site_url' => 'http://sugarpro.local',
        $smarty->assign('sugar_config', $sugar_config);

        if ($data)
        {
            if (is_array($data))
            {
                foreach($data as $key => $value)
                    $smarty->assign($key, $value);
            }
            else
            {
                $smarty->assign('data', $data);
            }
        }

        if (!is_file($file))
            return false;
        $this->_body = $smarty->fetch($file);
        return true;

    }


    public function addAttachment($path, $name = '', $encoding = 'base64', $type = 'application/octet-stream')
    {
        $this->_attached[] = array($path, $name, $encoding, $type);
        return $this;
    }


    public function send()
    {
        //echo $this->_body;
        //die();

        require_once("modules/Administration/Administration.php");
        $admin = new Administration();
        $admin->retrieveSettings();
        print_array($admin->settings);

        require_once('include/SugarPHPMailer.php');

        $mail = new SugarPHPMailer();
        if ($admin->settings['mail_sendtype'] == "SMTP") {
            $mail->Host = $admin->settings['mail_smtpserver'];
            $mail->Port = $admin->settings['mail_smtpport'];
            if ($admin->settings['mail_smtpauth_req']) {
                $mail->SMTPAuth = TRUE;
                $mail->Username = $admin->settings['mail_smtpuser'];
                $mail->Password = $admin->settings['mail_smtppass'];

                //$mail->SMTPSecure = 'ssl';
                $mail->protocol = "ssl://";
                $mail->SMTPSecure = 'tls';
                //$mail->protocol = "tcp://";
            }
            $mail->Mailer   = "smtp";
            $mail->SMTPKeepAlive = true;
        }
        else {
            $mail->mailer = 'sendmail';
        }

        $mail->From     = $admin->settings['notify_fromaddress'];
        $mail->FromName = $admin->settings['notify_fromname'];

        $mail->IsHTML(true);
        $mail->ContentType = "text/html"; //"text/plain"

        if (!$this->_subject)
            return -1;

        $mail->Subject = $this->_subject;

        if (!$this->_body)
            return -2;
        $mail->Body = $this->_body;

        if (!$this->_emails)
            return -3;

        foreach($this->_emails as $value)
            $mail->AddAddress($value, $value);

        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        //$mail->ContentType = 'base64';

        if (count($this->_attached))
        {
            foreach($this->_attached as $att)
            {
                $mail->AddAttachment($att[0], $att[1], $att[2], $att[3]);
            }
        }
        if (!$mail->send())
        {
            $GLOBALS['log']->fatal("Mailer error: " . $mail->ErrorInfo);
            return -4;
        }
        return 1;

    }



}
