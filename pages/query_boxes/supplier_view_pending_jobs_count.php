<?php
    /*Supplier Function*/
    
    /*Count all supplier jobs which are pending*/

    $query="SELECT COUNT(jobID) AS jobCount  FROM supplier_job WHERE jobStatus='pending' ";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo $row['jobCount'];
    }

    
        
?>