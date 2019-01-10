<?php
session_start();
/*Worker Function*/
    
/*Update worker details*/
if(isset($_POST['updateProfile'])){ 

    require_once '../../db_config/config.php';
    $workerID=$_POST['workerID'];
    $workerName= $_POST['workerName'];
    $workerNIC= $_POST['workerNIC'];
    $workerPhone = $_POST['workerPhone'];
    $workerEmail = $_POST['workerEmail'];

    $_SESSION['userID']=$workerID;
    $_SESSION['userName']=$workerName;
    $_SESSION['userNIC']=$workerNIC;
    $_SESSION['userMobile']=$workerPhone;
    $_SESSION['userEmail']=$workerEmail;

    $querys = "UPDATE worker SET workerName='$workerName',workerNIC='$workerNIC',workerPhone='$workerPhone',workerEmail='$workerEmail' WHERE workerID='$workerID'";

    if(mysqli_query($conn,$querys))
    {

       echo "<script>window.location.replace('../worker.php');</script>";
        echo "<script>alert('Update Succefull')</script>";
    }
    else{
        echo "<script>window.location.replace('../worker.php');</script>";
    }
} else { echo "<script>alert('tryagain')</script>";
}

?>