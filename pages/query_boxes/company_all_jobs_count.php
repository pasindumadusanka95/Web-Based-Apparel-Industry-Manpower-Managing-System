<?php
    /*Company Function*/
    
    /*Count all jobs published by the company*/

    $query="SELECT COUNT(jobID) AS jobCount FROM company_job";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo $row['jobCount'];
    }

    
        
?>