<?php
/*Worker Function*/
    
/*Worker accpet a new job*/

session_start();
if(isset($_GET['jobID'])){
    //Deny access if he already in a job
    if($_SESSION['userStatus']=='offline'){
        //
        echo "<script>window.location.replace('../worker.php');alert('You are already joined a job');</script>";

        
    }else{

        require_once("../../db_config/config.php");
        $workerID=$_SESSION["userID"];
        $jobID=$_GET['jobID'];
        $_SESSION['jobID']=$jobID;
        $_SESSION['userStatus']='offline';
        $_SESSION['jobStatus']='Pending';

        $queryUpdate="UPDATE worker SET workerStatus='offline' WHERE workerID='$workerID'";
        mysqli_query($conn,$queryUpdate);

        $userquery="INSERT INTO worker_pending VALUES(NULL,'$jobID','$workerID',0)";

        if(mysqli_query($conn,$userquery)){
            $updateQuery="UPDATE supplier_job SET jobStatus='pending',workersJoined=workersJoined+1 WHERE jobID='$jobID'";
            mysqli_query($conn,$updateQuery);
            echo "<script>window.location.replace('../worker.php')</script>";
            
        }
        else{
            echo "<script>window.location.replace('../worker.php');alert('Oops something went wrong!');</script>";
        } 

    }
    
}



        
         
    ?>