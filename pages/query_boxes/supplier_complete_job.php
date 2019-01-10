<?php

    /*Supplier Function*/
    
    /*Complete the jobs*/

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require '../../mail/vendor/autoload.php';

    if(isset($_POST['completeJob'])){
        require_once('../../db_config/config.php');
        $jobID=$_POST['jobID'];
        $unit=$_POST['unitPrice'];
        $query1="UPDATE supplier_job SET jobStatus='done' WHERE jobID='$jobID'";
        
        
        
        if(mysqli_query($conn,$query1)){
            $query4="SELECT * FROM worker_pending,worker,supplier_job WHERE worker_pending.workerID=worker.workerID AND worker_pending.jobID=supplier_job.jobID AND worker_pending.jobID=$jobID";
            $result4=mysqli_query($conn,$query4);
            if(mysqli_num_rows($result4)>0){
                while($row=mysqli_fetch_assoc($result4)){
                    $jobID=$row['jobID'];
                    $userID=$row['workerID'];
                    
                    $query6="SELECT count(id) AS leaveCount FROM worker_leaves WHERE JobID='$jobID' AND workerID='$userID'";
                    $result6=mysqli_query($conn,$query6);
                    if(mysqli_num_rows($result6)>0){
                        $row6=mysqli_fetch_assoc($result6);
                        $leaveCount=$row6['leaveCount'];
                        $totalPay=$row['jobPeriod']*$unit-($leaveCount*$unit/2);

                        $query7="INSERT INTO invoice VALUES(NULL,'$jobID','$userID','$totalPay',0)";
                        mysqli_query($conn,$query7);
                    }
                    
                }
                
            }
            $query9="SELECT * FROM worker_pending,worker,supplier_job WHERE worker_pending.workerID=worker.workerID AND worker_pending.jobID=supplier_job.jobID AND worker_pending.jobID=$jobID";
            $result9=mysqli_query($conn,$query9);
            if(mysqli_num_rows($result9)>0){
                $row9=mysqli_fetch_assoc($result9);
                $comID=$row9['comID'];
                $price=$row9['jobPrice'];
                $query8="INSERT INTO invoice VALUES(NULL,'$jobID','$comID','$price',0)";
                if(mysqli_query($conn,$query8)){
                    echo "";
                }
                $dateNow=date("Y-n-d");
                $notification="A&S Manpower Solutions completed the job ".$row9['comJobID']." on $dateNow";
                $query2="UPDATE company_job SET jobStatus='done' WHERE jobID=".$row9['comJobID']."";
                if(mysqli_query($conn,$query2)){
                    echo "
                        <form method='post' action='insertnoti.php' id='comment_form'>
                            <div class='form-group'>
                             <label>Enter Notification ID</label>
                             <input value='$userID' type='text' name='notificationID' id='notificationID' class='form-control'>
                            </div>
                               <div class='form-group'>
                             <label>Enter User Type</label>
                             <input type='text' name='userType' value=1 id='userType' class='form-control'>
                            </div>
                            <div class='form-group'>
                             <label>Enter Notification</label>
                             <input value='$notification' name='notification' id='notification' class='form-control' rows='5'>
                            </div>
                            <div class='form-group'>
                             <input type='submit' class='btn btn-info' value='Post' />
                            </div>
                        </form>";


                    echo "<script>
                            document.getElementById('comment_form').submit();
                       </script>";
                    
                }
                
            }
            
            
                
                
               
        }
        
        
    }
    


?>