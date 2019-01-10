<?php
/*Supplier Function*/
    
/*add new worker to the system*/

    
if(isset($_POST['addWorker'])){
    require_once("../../db_config/config.php");

    $userName=$_POST['name'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $password1=$_POST['pwd1'];
    $usertype=$_POST['role'];

    $hashed_password=hash('sha512',$password1);

    
    $id="W".(int)$mobile;
    $name = $_FILES['file']['name'];
    $target_dir = "../Assests/worker/";
    $target_file = $target_dir . $_FILES["file"]["name"];
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");
    if( in_array($imageFileType,$extensions_arr) ){
        $image = "$target_file";       
        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
        $userquery="INSERT INTO users VALUES('$id','$hashed_password','$usertype')";
        mysqli_query($conn,$userquery);
        $query="INSERT INTO worker (`workerID`,`workerName`,`workerPhone`,`workerEmail`,`workerImage`) VALUES ('$id','$useName','$mobile','$email','".$image."')";
        $result=mysqli_query($conn,$query);
        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
        if($result){
            echo "<script>window.location.replace('../supplier.php');alert('Add Manpower MemberSuccess!!!');</script>";
        }
        else{
            echo "window.location.replace('../supplier.php');<script>alert('try again');</script>";
        } 
    }            
    
    
}
?>