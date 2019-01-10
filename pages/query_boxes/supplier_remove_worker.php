<?php
    /*Supplier Function*/
    
    /*Remove workers*/

	if(isset($_POST['removeWorker'])){
		require_once "../../db_config/config.php";
		$workerID=$_POST['workerID'];
		$query="DELETE FROM worker WHERE workerID='$workerID'";
        
		if(mysqli_query($conn,$query)){
			echo "<script>window.location.replace('../others/tables/data.php');</script>";
		}else{
            echo "<script>window.location.replace('../others/tables/data.php');alert('User already joined a job!')</script>";
        }
	}

?>