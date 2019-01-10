<?php
/*Supplier Function*/
    
/*Start the newly published jobs*/

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../mail/vendor/autoload.php';
    
    if(isset($_POST['startJob'])){
        require_once('../../db_config/config.php');
        $jobID=$_POST['jobID'];
        
        $query1="UPDATE supplier_job SET jobStatus='start' WHERE jobID='$jobID'";
        
        if(mysqli_query($conn,$query1)){
            $query2="SELECT * FROM worker_pending,location,worker,supplier_job WHERE worker_pending.workerID=worker.workerID AND worker_pending.jobID=supplier_job.jobID AND supplier_job.locationID=location.locID AND worker_pending.jobID='$jobID'";
            $result=mysqli_query($conn,$query2);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $useremail=$row['workerEmail'];
                    $loc=$row['locName'].", ".$row['locStreet'].", ".$row['locVillage'].", ".$row['loccity'];
                    $job=$row['jobTitle'];

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
                        $mail->setFrom('grpproject.testing@gmail.com', 'A&S Manpower');
                        $mail->addAddress($useremail, 'A&S Manpower');     // Add a recipient


                        //Content
                        $mail->isHTML(true);                                  // Set email   format to HTML
                        $mail->Subject = 'A&S Manpower Solutions';
                        $mail->Body = "This is to inform about you that you have been selected to the manpower job <b>$job</b> and you have to come to <b>$loc</b> tommorrow.";
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        $mail->send();
                        echo "<script>window.location.replace('../supplier.php');</script>";
                    } catch (Exception $e) {
                        echo "<script>window.location.replace('../supplier.php');alert('Job Started!');</script>"; 

                    }
                    
                    
                }
                
            }
                
               
        }
        
        
    }
    


?>