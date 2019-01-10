<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_GET['SendMail'])) {
    $useremail=$_GET['email'];
    $loc=$_GET['loc'];
    $job=$_GET['job'];
    
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
        $mail->addAddress($useremail, 'A&S Manpower');     // Add a recipient


        //Content
        $mail->isHTML(true);                                  // Set email   format to HTML
        $mail->Subject = 'A&S Manpower Solutions';
        $mail->Body = "This is to inform about you that you have been selected to the manpower job <b>$job</b> and you have to come to <b>$loc</b> tommorrow.";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo "<script>window.location.replace('../pages/supplier.php');</script>";
    } catch (Exception $e) {
        echo 'Email could not be sent. Mailer Error: ', $mail->ErrorInfo;

    }
}