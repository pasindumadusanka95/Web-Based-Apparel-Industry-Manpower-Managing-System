<?php
	session_start();
	require_once '../../db_config/config.php';
	$workerID=$_SESSION['userID'];
    $jobID=$_SESSION['jobID'];
	$queryDelete="DELETE FROM worker_pending WHERE workerID='$workerID'";
	
	$queryUpdate="UPDATE worker SET workerStatus='online' WHERE workerID='$workerID'";
    $queryUpdate2="UPDATE supplier_job SET workersJoined=workersJoined-1 WHERE jobID='$jobID'";


	$_SESSION['userStatus']='online';
    $userID=$_SESSION['userID'];
    $userType=$_SESSION['userType'];
    $notification=$userID." leaved from the job";
	if(mysqli_query($conn,$queryDelete)){
		mysqli_query($conn,$queryUpdate);
        mysqli_query($conn,$queryUpdate2);
        
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
        
        
        
	}else{
		echo "window.location.replace('../worker.php');alert('Try again!!!');</script>";
	}

?>