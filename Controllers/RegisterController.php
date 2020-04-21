<?php
use PHPMailer\PHPMailer\PHPMailer;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require_once('Controller.php');
require_once('Model/AdvertModel.php');

class RegisterController extends Controller {
    public static function registerAction() {
        $login = $_POST['login'];
        $email = $_POST['email'];
        $typeId = 1;
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $loginRepeated = SessionModel::loginRepeated($login);
//        $emailRepeated = SessionModel::emailRepeated($login);
        $emailRepeated = false;

        $secret = '6LeH0MIUAAAAAJnI0UTRyLAEKQfFEg233Gk3i92S';
        $response = $_POST['g-recaptcha-response'];
        $remoteip = $_SERVER['REMOTE_ADDR'];

        $url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
        $result = json_decode($url, TRUE);
        if ($result['success'] == 1) {
            if($loginRepeated || $emailRepeated) echo('Please choose different login or email!');

            else if(!empty($login) && !empty($email) && !empty($phone) && !empty($password)) {
                $link = 'http://olczykpazik.eu/confirm/?email='.$email;
                SessionModel::registerAction($login, $email, $typeId, $phone, $password);
                self::sendEmailTo($email, $link);

                header("location: login");
            }

            else {
                echo('<h2 class="error">Please fill out all required fields!</h2>');
            }
        } else {
            echo('<h2 class="error">Wrongly filled reCAPTCHA!</h2>');
        }
    }

    public static function sendEmailTo($email, $link) {
        $smtpUsername = 'bdiambdiam@gmail.com';
        $smtpPassword = 'bazydanych123';
        $emailFrom = 'bdiambdiam@gmail.com';
        $emailFromName = 'BDiAM';
        $emailTo = $email;
        $emailToName = $email;

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUsername;
        $mail->Password = $smtpPassword;
        $mail->setFrom($emailFrom, $emailFromName);
        $mail->addAddress($emailTo, $emailToName);
        $mail->Subject = 'Confirm the activation of your account';
        $mail->msgHTML("Please click the link: ".$link);
        $mail->AltBody = 'HTML messaging not supported';

        if(!$mail->send()){
            echo "Mailer Error: " . $mail->ErrorInfo;
        }else{
            echo "Message sent!";
        }
    }
}