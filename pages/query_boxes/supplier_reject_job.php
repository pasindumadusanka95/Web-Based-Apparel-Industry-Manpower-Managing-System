<?php
    /*Supplier Function*/
    
    /*Reject company jobs*/
	session_start();
    if(isset($_POST['jobID'])){
        require_once '../../db_config/config.php';
        $jobID=$_POST['jobID'];

        $queryUpdate="UPDATE company_job SET jobStatus='rejected' WHERE jobID='$jobID'";

        $notification="A&S Manpower Solutions Reject the job ".$jobID;
        if(mysqli_query($conn,$queryUpdate)){

            echo "
                <form method='post' action='insertnoti.php' id='comment_form'>
                    <div class='form-group'>
                     <label>Enter Notification ID</label>
                     <input value='S2147483647' type='text' name='notificationID' id='notificationID' class='form-control'>
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



        }else{
            echo "window.location.replace('../supplier.php');alert('Try again!!!');</script>";
        }
    }
	

?>