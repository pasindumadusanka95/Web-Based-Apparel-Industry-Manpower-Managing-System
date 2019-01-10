<?php
    /*Worker Function*/
    
    /*View all offline workers*/

	if($_SESSION['userStatus']=='offline'){
		$workerID=$_SESSION['userID'];

		$query="SELECT * FROM worker_pending,worker,supplier_job,location WHERE worker_pending.workerID='$workerID' AND worker.workerID=worker_pending.workerID AND worker_pending.jobID=supplier_job.jobID AND supplier_job.locationID=location.locID";

		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_assoc($result);

		$_SESSION['jobID']= $row['jobID'];
		$_SESSION['jobStatus']=$row['jobStatus'];
		$_SESSION['locName']= $row['locName'];
		$_SESSION['jobAmount']= $row['jobCount'];
		$_SESSION['jobDays'] = $row['jobPeriod'];

		echo "<script>show_div('job')</script>";
	}else{
		echo "<script>hide_div('job')</script>";

	}


?>