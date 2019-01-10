<?php
    /*Supplier Function*/
    
    /*Count all locations*/

    $query="SELECT COUNT(locID) AS locCount  FROM location";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo $row['locCount'];
    }

    
        
?>