<?php
    session_start();
    /*Worker Function*/
    
    /*Update worker personal data*/

    if(isset($_POST['save'])){ // Fetching variables of the form which travels in URL
        require_once '../../db_config/config.php';
        $workerID=$_POST['workerID'];
        $workerName= $_POST['workerName'];
        $workerNIC = $_POST['workerNIC'];
        $workerPhone = $_POST['workerPhone'];
        $workerEmail = $_POST['workerEmail'];
        
        $_SESSION['userID']=$workerID;
        $_SESSION['userName']=$workerName;
        $_SESSION['userNIC']=$workerNIC;
        $_SESSION['userPhone']=$workerPhone;
        $_SESSION['userEmail']=$workerEmail;

        $query = "UPDATE worker SET workerName='$workerName',workerNIC='$workerNIC',workerPhone='$workerPhone',workerEmail='$workerEmail' WHERE workerID='$workerID'";
        if(mysqli_query($conn,$query))
        {
         echo "<script>window.location.replace('../worker.php');</script>";
        }
        else{
         echo "<script>window.location.replace('../worker.php');</script>";
        }
    }

?>