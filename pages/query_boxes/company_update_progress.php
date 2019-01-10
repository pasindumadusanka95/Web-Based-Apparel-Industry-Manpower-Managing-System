<?php
    /*Supplier Function*/
    
    /*Update supplier job progress*/

    if(isset($_POST["updateJob"])){
        $jobID=$_POST["jobID"];
        $jobProgress=$_POST["jobProgress"];
        $prevProgress=$_POST["prevProgress"];
        $count=$_POST["jobCount"];
        
        $totalProgress=(($prevProgress+$jobProgress)/$count)*100;
        echo $totalProgress;
        require_once("../../db_config/config.php");
        $queryJob="UPDATE supplier_job SET jobProgress=$totalProgress WHERE jobID='$jobID' ";
        $resultJob=mysqli_query($conn,$queryJob);
    
        if(mysqli_query($conn,$queryJob))
            {
            echo "<script>window.location.replace('../supplier.php');</script>";
            }
            else{
            echo "<script>window.location.replace('../supplier.php');alert('Try again!!!');</script>";
            }
    }    
?>
