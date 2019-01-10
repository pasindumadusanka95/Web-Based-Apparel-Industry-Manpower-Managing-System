<?php
    /*Supplier Function*/
    
    /*Supplier publish new company job*/
    session_start();
	if(isset($_POST['publishJob'])){
		require_once '../../db_config/config.php';
		$jobID=$_POST['jobID'];
		$jobTitle=$_POST['jobTitle'];
		$jobType=$_POST['jobType'];
		$jobAmount=$_POST['jobAmount'];
		$workerCount=$_POST['workerCount'];
		$jobPeriod=$_POST['jobPeriod'];
		$jobPublished=$_POST['jobPublishedD'];
		$supID=$_POST['suppID'];
		$locID=$_POST['locID'];
		$comID=$_POST['compID'];
        $comJobID=$_POST['comJobID'];
        $jobNature=$_POST['jobNature'];
        $jobPrice=$_POST['jobPrice'];
        
        
        $userID=$_SESSION['userID'];

		$query="INSERT INTO supplier_job (`jobTitle`,`jobType`,`jobCount`,`workerCount`,`jobPeriod`,`jobStatus`,`jobPublished`,`supID`,`locationID`,`comID`,`comJobID`,`jobPrice`,`jobNature`) VALUES ('$jobTitle','$jobType','$jobAmount','$workerCount','$jobPeriod','online','$jobPublished','$supID','$locID','$comID','$comJobID','$jobPrice','$jobNature')";

		if(mysqli_query($conn,$query)){
			$queryUpdate="UPDATE company_job SET jobStatus='online' WHERE jobID=$jobID";
			mysqli_query($conn,$queryUpdate);

           /* echo "
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
                 <input value='Manpower Solutions published new jobs' name='notification' id='notification' class='form-control' rows='5'>
                </div>
                <div class='form-group'>
                 <input type='submit' name='post' id='post' class='btn btn-info' value='Post' />
                </div>
            </form>";
        
        
            echo "<script>
                document.getElementById('comment_form').submit();
           </script>";*/
            echo "<script>window.location.replace('../supplier.php');</script>";
           
		}else{
			echo "alert('Try Again!!!');</script>";
		}



	}
	
?>