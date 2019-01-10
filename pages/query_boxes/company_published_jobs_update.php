<?php
    /*Company Function*/
    
    /*Update published company jobs*/

    if(isset($_POST['publishedJobUpdate'])){ // Fetching variables of the form which travels in URL
        require_once("../../db_config/config.php");
        $jobID=$_POST['jobID'];
        $jobTitle= $_POST['jobTitle'];
        $jobType = $_POST['jobType'];
        $jobAmount = $_POST['jobAmount'];
        $jobPeriod = $_POST['jobPeriod'];
        $jobPrice = $_POST['jobPrice'];
        
        $query = "UPDATE company_job SET jobTitle='$jobTitle' , jobType='$jobType',jobAmount='$jobAmount',jobPeriod='$jobPeriod',jobPrice='$jobPrice' WHERE jobID=$jobID";
        if(mysqli_query($conn,$query))
        {
         echo "<script>window.location.replace('../company.php');alert('Published Job Details Update Success!!!');</script>";
        }
        else{
         echo "<script>window.location.replace('../company.php');alert('Try again!!!');</script>";
        }
}


?>