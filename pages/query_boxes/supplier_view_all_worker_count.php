<?php
    /*Supplier Function*/
    
    /*Count all workers*/

    $query="SELECT COUNT(workerID) AS workerCount  FROM worker";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo $row['workerCount'];
    }

    
        
?>