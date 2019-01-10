<?php
$connection = mysqli_connect("localhost","root","","manpower"); // Establishing Connection with Server
session_start();
if(isset($_POST["notificationID"])){ // Fetching variables of the form which travels in URL
   
    $notificationID = mysqli_real_escape_string($connection, $_POST['notificationID']);
	$notification = mysqli_real_escape_string($connection, $_POST['notification']);
    $userType = mysqli_real_escape_string($connection,$_POST['userType']);
    $time=date("M,d,Y h:i:s A");
	
    $query = "INSERT INTO notification(notificationID,notification,userType,time) VALUES ('$notificationID','$notification','$userType','$time')";

    if(mysqli_query($connection,$query)){
        if($_SESSION['userType']==3){
            echo "<script>window.location.replace('../worker.php');hide_div('job')</script>";    
        }
        else if($_SESSION['userType']==2){
            echo "<script>window.location.replace('../supplier.php');</script>";    
        }
        else{
            echo "<script>window.location.replace('../company.php')</script>";    
        }
        
    }
}
?>