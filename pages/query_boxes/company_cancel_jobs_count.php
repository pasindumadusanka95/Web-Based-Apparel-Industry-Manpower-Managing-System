<?php
    /*Company Function*/
    
    /*View all company jobs count which job status is cancle*/

    $query="SELECT COUNT(jobID) AS jobCount  FROM company_job WHERE jobStatus='cancle' ";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo $row['jobCount'];
    }

    
        
?>