<?php
/*All users Function*/
    
/*Register company and worker*/


if(isset($_POST['submitRegister'])){
    require_once("../../db_config/config.php");

    $userName=$_POST['name'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $password1=$_POST['pwd1'];
    $password2=$_POST['pwd2'];
    $usertype=$_POST['role'];

    $hashed_password=hash('sha512',$password1);

    if($usertype==3){
        $id="W".(int)$mobile;
        $name = $_FILES['file']['name'];
        $target_dir = "../../img/img-worker/";
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
            if(mysqli_query($conn,$userquery)){
                $query="INSERT INTO worker (`workerID`,`workerName`,`workerPhone`,`workerEmail`,`workerImage`) VALUES ('$id','$userName','$mobile','$email','".$image."')";
                $result=mysqli_query($conn,$query);
                // Upload file
                move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                if($result){
                   echo "<script>window.location.replace('../login.php');alert('You have successfully registered in the system');</script>";
                }
                else{
                    echo "<script>alert('try again');</script>";
                } 
            }else{
                    echo "<script>alert('try again');</script>";
                } 
            
            
        }            
    }
    else if($usertype==1){
        $id="C".(int)$mobile;
        $name = $_FILES['file']['name'];
        $target_dir = "../../img/img-worker/";
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
            $query="INSERT INTO company (`comID`,`comName`,`comPhone`,`comEmail`) VALUES ('$id','$name','$mobile','$email')";

            $result=mysqli_query($conn,$query);
            if($result){
                echo "<script>window.location.replace('../../index.php');</script>";
            }
            else{
                echo "<script>window.location.replace('../index.php');alert('Try again!!!');</script>";
            } 
            
        }

      
    }
}
?>