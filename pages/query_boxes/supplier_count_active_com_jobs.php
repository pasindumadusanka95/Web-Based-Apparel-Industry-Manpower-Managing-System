<?php
    /*Supplier Function*/
    
    /*Count all online company jobs*/
    
    $query="SELECT COUNT(jobID) AS comJCount  FROM company_job WHERE jobStatus='online'";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo $row['comJCount'];
    }

    
        
?>