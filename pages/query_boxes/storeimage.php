<?php
require_once('../../db_config/config.php');

if(isset($_POST['but_upload'])){
 
 $name = $_FILES['file']['name'];
 $target_dir = "uploads/";
    
 
    
    
$target_file = $target_dir . $_FILES["file"]["name"];
 // Select file type
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 // Valid file extensions
 $extensions_arr = array("jpg","jpeg","png","gif");

 // Check extension
 if( in_array($imageFileType,$extensions_arr) ){
 
  
       $image = "$target_file";
  // Insert record
  $query = "insert into uploadimages(image) values('".$image."')";
  mysqli_query($conn,$query);
  
  // Upload file
  move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
 }
 
}
?>