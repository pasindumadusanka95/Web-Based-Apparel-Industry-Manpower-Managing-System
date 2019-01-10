<?php
    /*Company Function*/
    
    /*View all jobs company jobs count where job state is offline*/
    
    $query="SELECT COUNT(jobID) AS jobCount  FROM company_job WHERE jobStatus='offline' ";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo $row['jobCount'];
    }

    
        
?>