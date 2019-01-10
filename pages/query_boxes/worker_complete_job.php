<?php
session_start();
/*Worker Function*/
    
/*When worker print the invoice his states are changed to accept new jobs*/

if(isset($_GET['jobID'])){

        require_once("../../db_config/config.php");
        $workerID=$_SESSION["userID"];
        $jobID=$_GET['jobID'];
        $_SESSION['jobID']=$jobID;
        $_SESSION['userStatus']='online';

        $queryUpdate="UPDATE worker SET workerStatus='online' WHERE workerID='$workerID'";
        mysqli_query($conn,$queryUpdate);
    
        $query3="UPDATE worker_pending SET isDone=1 WHERE jobID='$jobID' AND workerID='$workerID'";
        mysqli_query($conn,$query3);

        $userquery="SELECT * FROM invoice WHERE jobID='$jobID' AND userID='$workerID' LIMIT 1";
        $result=mysqli_query($conn,$userquery);
        if(mysqli_num_rows($result)>0){
           $row=mysqli_fetch_assoc($result);
            $invID=$row['invoiceID'];
            print_r($row);
            echo "<script>window.location.replace('../../print/print.php?id=$invID');</script>";
            
        }
        else{
            echo "<script>window.location.replace('../worker.php');alert('Oops something went wrong!');</script>";
        } 

    }
    



        
         
    ?>