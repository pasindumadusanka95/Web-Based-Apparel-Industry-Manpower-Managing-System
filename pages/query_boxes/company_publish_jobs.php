<?php
    session_start();
    /*Company Function*/
    
    /*Company adds new company jobs*/


    if(isset($_POST['addComJob'])){ 
        //Require database connection
        require_once('../../db_config/config.php');
        //Assign data to the variables
        $jobTitle= $_POST['jobTitle'];
        $jobType = $_POST['jobType'];
        $jobAmount = $_POST['jobAmount'];
        $jobPeriod = $_POST['jobPeriod'];
        $jobPrice = $_POST['jobPrice'];
        $jobDate = $_POST['jobDate'];
        $jobStatus = 'offline';
        $comID = $_SESSION['userID'];
        $supID = 'S2147483647';

        //Insert company job sql query
        $query = "INSERT INTO company_job (jobTitle,jobType,jobAmount,jobPeriod,jobPrice,jobDate,jobStatus,comID,supID) VALUES ('$jobTitle','$jobType','$jobAmount','$jobPeriod','$jobPrice','$jobDate','$jobStatus','$comID','$supID')";
        //Check whether the sql query executed successfully
        $notification=$comID." Published new $jobTitle job for you.";
        if(mysqli_query($conn,$query)){
            //If true alert message and redirect to company.php file
             echo "
            <form method='post' action='insertnoti.php' id='comment_form'>
                <div class='form-group' style='display:none'>
                 <label>Enter Notification ID</label>
                 <input value='$userID' type='text' name='notificationID' id='notificationID' class='form-control'>
                </div>
                   <div class='form-group' style='display:none'>
                 <label>Enter User Type</label>
                 <input type='text' name='userType' value=2 id='userType' class='form-control'>
                </div>
                <div class='form-group' style='display:none'>
                 <label>Enter Notification</label>
                 <input value='$notification' name='notification' id='notification' class='form-control' rows='5'>
                </div>
                <div class='form-group' style='display:none'>
                 <input type='submit' class='btn btn-info' value='Post' />
                </div>
            </form>";


            echo "<script>
                document.getElementById('comment_form').submit();
           </script>";
            
            
            echo "<script>alert('Company Job Published Success!!!');</script>";
        }
        else{
            //If false redirect to same page and display error message
            echo "<script>window.location.replace('../company.php');alert('Try again!!!');</script>";
        }
    
}

?>