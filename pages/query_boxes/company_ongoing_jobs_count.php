<?php
    /*Company Function*/
    
    /*Count all company jobs which state is online*/

    $query="SELECT COUNT(jobID) AS jobCount  FROM company_job WHERE jobStatus='online' ";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo $row['jobCount'];
    }

    
        
?>