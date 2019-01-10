<?php
session_start();
/*All User Function*/
    
/*Login function*/

if(isset($_POST['submitLogin'])){
    require_once('../../db_config/config.php');
    
    $username=$_POST['nameL'];
    $password=$_POST['pwdL'];
    
    $hashed_password=hash('sha512',$password);
    
    $query="SELECT * FROM users WHERE userID='$username' AND userPassword='$hashed_password' LIMIT 1";
    
    $result=mysqli_query($conn,$query);
    
    if(mysqli_num_rows($result)>0){
        $userlogin = mysqli_fetch_assoc($result);
        
        $_SESSION["userID"]=$username;
        $_SESSION["userType"]=$userlogin["userType"];
        
        
        /*If user type is worker*/  
        if($userlogin["userType"]==3){
            $queryUser="SELECT * FROM worker WHERE workerID='$username' LIMIT 1";
            $resultUser=mysqli_query($conn,$queryUser);
            $userDetails=mysqli_fetch_assoc($resultUser);
            $_SESSION["userName"]=$userDetails["workerName"];
            $_SESSION["userNIC"]=$userDetails["workerNIC"];
            $_SESSION["userMobile"]=$userDetails["workerPhone"];
            $_SESSION["userEmail"]=$userDetails["workerEmail"];
            $_SESSION["userImage"]=$userDetails["workerImage"];
            $_SESSION["userStatus"]=$userDetails["workerStatus"];
            echo "<script>window.location.replace('../worker.php');</script>";
        }
        /*If user type is supplier*/
        else if($userlogin["userType"]==2){
            $queryUser="SELECT * FROM supplier WHERE supID='$username' LIMIT 1";
            $resultUser=mysqli_query($conn,$queryUser);
            $userDetails=mysqli_fetch_assoc($resultUser);
            $_SESSION["userName"]=$userDetails["supName"];
            echo "<script>window.location.replace('../supplier.php');alert('Login Success!!!');</script>";
        }
        /*If user type is company*/
        else if($userlogin["userType"]==1){
            $queryUser="SELECT * FROM company WHERE comID='$username' LIMIT 1";
            $resultUser=mysqli_query($conn,$queryUser);
            $userDetails=mysqli_fetch_assoc($resultUser);
            $_SESSION["userID"]=$userDetails["comID"];
            $_SESSION["userName"]=$userDetails["comName"];
            $_SESSION["userMobile"]=$userDetails["comPhone"];
            $_SESSION["userEmail"]=$userDetails["comEmail"];
            $_SESSION["userAddress"]=$userDetails["comAddress"];
            echo "<script>window.location.replace('../company.php');alert('Login Success!!!');</script>";
        }
    }
    else{
       echo "<script>alert('Try again');</script>";
    }

}

?>