<?php
    /*Company Function*/
    
    /*View rejected company jobs count*/

    $query="SELECT COUNT(jobID) AS jobCount  FROM company_job WHERE jobStatus='rejected' ";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo $row['jobCount'];
    }

    
        
?>