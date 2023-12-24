<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
function verify_email($name,$email,$token){

$mail = new PHPMailer(true);

try {
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'tahasheikh1829@gmail.com';                     //SMTP username
    $mail->Password   = 'bnbu kndw kupn dtqm';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('tahasheikh1829@gmail.com', 'Muahmmad Taha');
    $mail->addAddress($email);               //Name is optional
    $mail->addReplyTo('tahasheikh1829@gmail.com', 'Muahmmad Taha');

    //Content
    $mail->isHTML(true);                                 
    $mail->Subject = "Email Address Verification.";
    $mail->Body    = "
	<h1>Hello ". $name . ", You have been registerd with sasolution</h1>
	<h2>Verify your email address to login with the below given link</h2>
    <h3><a href = 'https://tahasheikh56.000webhostapp.com/verify_email.php?token=$token'>Click Me</a></h3>
	";

    $mail->send();
    // echo "mail sent";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
if(isset($_POST["send"])){
extract($_POST);
$token = md5(rand());
verify_email($name,$email,$token);
}
?>