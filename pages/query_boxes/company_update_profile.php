<?php
    session_start();
    /*Company Function*/
    
    /*uPDATE company profile*/


    if(isset($_POST['updateProfile'])){ // Fetching variables of the form which travels in URL
        
        require_once '../../db_config/config.php';
        $comID=$_POST['CompanyId'];
        $comName= $_POST['CompanyName'];
        $comPhone = $_POST['ContactNo'];
        $comAdd = $_POST['CompanyAdd'];
        $comEmail = $_POST['CompanyEmail'];
        
        $_SESSION['userID']=$comID;
        $_SESSION['userName']=$comName;
        $_SESSION['userMobile']=$comPhone;
        $_SESSION['userAddress']=$comAdd;
        $_SESSION['userEmail']=$comEmail;

        $query = "UPDATE company SET comName='$comName',comPhone='$comPhone',comEmail='$comEmail',comAddress='$comAdd' WHERE comID='$comID'";
        if(mysqli_query($conn,$query))
        {
         echo "<script>window.location.replace('../company.php');</script>";
        }
        else{
         echo "<script>window.location.replace('../company.php');</script>";
        }
    } else { echo "<script>alert('tryagain')</script>";
        }

?>