<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Model
{
    public $mail;
    function __construct()
    {
        try {
            $this->db = new Database();
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->db->setAttribute(PDO::ATTR_PERSISTENT, TRUE);
        }
        catch(PDOException $e)
        {
            $e->getMessage();
        }

        $this->mail = new PHPMailer();
        $this->mail->isSMTP();                            // Set mailer to use SMTP
        $this->mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true;                     // Enable SMTP authentication
        $this->mail->Username = 'acatism2019@gmail.com';          // SMTP username
        $this->mail->Password = 'aca98_tism97'; // SMTP password
        $this->mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = 587;
        $this->mail->isHTML(true);
        $this->mail->SetFrom('acatism2019@gmail.com');
    }
}
