<?php
    /*Supplier Function*/
    
    /*Count all worker leaves*/

    $query="SELECT COUNT(jobID) AS leaveCount  FROM worker_leaves";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo $row['leaveCount'];
    }

    
        
?>