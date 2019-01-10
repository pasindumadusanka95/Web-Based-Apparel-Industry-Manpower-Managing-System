<?php
    /*Company Function*/
    
    /*Delete company job where job state is cancel*/


    if (isset($_POST['DeleteJob'])) {


        require_once("../../db_config/config.php");
        $jobID = $_POST['jobID'];

        $query = "DELETE FROM company_job WHERE jobStatus='cancle' AND jobID=$jobID";
        
        if (mysqli_query($conn, $query)) {
            echo "<script>window.location.replace('../company.php');alert('Cancel Job is Deleted!!!');</script>";
}
         else {
            echo "<script>window.location.replace('../company.php');alert('Try again!!!');</script>";
        }
           
    }


?>