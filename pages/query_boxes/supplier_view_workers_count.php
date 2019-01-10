<?php
    /*Supplier Function*/
    
    /*View all workers count*/

    $query="SELECT COUNT(workerID) AS workerCount  FROM worker WHERE workerStatus='offline' ";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo $row['workerCount'];
    }

    
        
?>