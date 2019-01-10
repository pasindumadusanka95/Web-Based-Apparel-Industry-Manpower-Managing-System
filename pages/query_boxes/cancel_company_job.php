<?php
    /*Company Function*/
    
    /*Company cancel published jobs by changing it's state to cancel*/

    if (isset($_POST['CanceledJob'])) {
        require_once("../../db_config/config.php");
        $jobID = $_POST['jobID'];
        $query = "UPDATE company_job SET jobStatus='cancle' WHERE jobID=$jobID";
        if (mysqli_query($conn, $query)) {
            echo "<script>window.location.replace('../company.php');alert('Published Job is Canceled!!!');</script>";
        } else {
            echo "<script>window.location.replace('../company.php');alert('Try again!!!');</script>";
        }


}