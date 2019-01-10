<?php
/*Suplier Function*/
    
/*Add working locations*/


if(isset($_POST['addLoc'])){
    require_once('../../db_config/config.php');
    $locID=$_POST['locID'];
    $locName=$_POST['locName'];
    $locStreet=$_POST['locStreet'];
    $locVillage=$_POST['locVillage'];
    $locCity=$_POST['locCity'];
    
    $query="INSERT INTO location VALUES('$locID','$locName','$locStreet','$locVillage','$locCity')";
    if(mysqli_query($conn,$query)){
        echo "<script>window.location.replace('../others/tables/dataLoc.php');alert('Location ".$locName." added!');</script>";
    }
}
    
    
?>