<?php
    /*Supplier Function*/
    
    /*Update working location detail*/

    if(isset($_POST['locUpdate'])){
        require_once('../../db_config/config.php');
        $locID=$_POST['locID'];
        $locName=$_POST['locName'];
        $locStreet=$_POST['locStreet'];
        $locVillage=$_POST['locVillage'];
        $locCity=$_POST['locCity'];
        
        $query="UPDATE location SET locID='$locID',locName='$locName',locStreet='$locStreet',locVillage='$locVillage',locCity='$locCity' WHERE locID='$locID'";
        if(mysqli_query($conn,$query)){
           echo "<script>window.location.replace('../others/tables/dataLoc.php');alert('Location ".$id." updated!');</script>";
        }
    }


?>