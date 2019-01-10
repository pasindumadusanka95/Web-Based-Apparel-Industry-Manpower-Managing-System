<?php
    /*Worker Function*/
    
    /*Worker temporary leave from the job*/

	session_start();
	require_once '../../db_config/config.php';
	$workerID=$_SESSION['userID'];
    $jobID=$_SESSION['JobID'];
    $date=date("Y-n-d");
    $time=date("h:i:sa");

    $tempquery = "INSERT INTO worker_leaves (workerID,JobID,date,time) VALUES ('$workerID','$jobID','$date','$time')";

    $_SESSION['userStatus']='offline';
    $userID=$_SESSION['userID'];
    $userType=$_SESSION['userType'];
    $notification=$userID." temporary leaved from the job";
    if(mysqli_query($conn,$tempquery)){


    echo "
            <form method='post' action='insertnoti.php' id='comment_form'>
                <div class='form-group'>
                 <label>Enter Notification ID</label>
                 <input value='$userID' type='text' name='notificationID' id='notificationID' class='form-control'>
                </div>
                   <div class='form-group'>
                 <label>Enter User Type</label>
                 <input type='text' name='userType' value=2 id='userType' class='form-control'>
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

    echo "<script>window.location.replace('../worker.php');alert('Temporary leave success');</script>";

}else{
    echo "<script>alert('Sorry! You cannot leave more than one time per day');window.location.replace('../worker.php');</script>";
}

?>