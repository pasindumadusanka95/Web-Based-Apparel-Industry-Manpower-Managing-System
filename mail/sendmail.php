<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST['SendMail'])) {
    $useremail=$_POST['Cemail'];
    $PIN=$_POST['randomPIN'];
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 1;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'grpproject.testing@gmail.com';                 // SMTP username
        $mail->Password = 'grpproject123';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('grpproject.testing@gmail.com', 'test');
        $mail->addAddress($useremail, 'A&S ManPower');     // Add a recipient


        //Content
        $mail->isHTML(true);                                  // Set email   format to HTML
        $mail->Subject = 'Account Verification ';
        $mail->Body = "This is the verification code of your account <b>$PIN</b>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo "<script>window.location.replace('../pages/verification_confirm.php');alert('Oops something went wrong!');</script>";
    } catch (Exception $e) {
        echo 'Email could not be sent. Mailer Error: ', $mail->ErrorInfo;

    }
}