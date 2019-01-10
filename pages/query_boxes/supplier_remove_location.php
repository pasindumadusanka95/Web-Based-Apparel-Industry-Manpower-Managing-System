<?php
    /*Supplier Function*/
    
    /*Remove locations*/
    if(isset($_POST['locID'])){
        require_once('../../db_config/config.php');
        $id=$_POST['locID'];
        $query="DELETE FROM location WHERE locID='$id'";
        if(mysqli_query($conn,$query)){
           echo "<script>window.location.replace('../others/tables/dataLoc.php');alert('Location ".$id." deleted!');</script>";
        }
    }


?>