<?php
    /*Supplier Function*/
    
    /*View all supplier jobs by location*/
    
    $query="SELECT location.locCity, COUNT(*) AS locCount FROM supplier_job,location WHERE location.locID=supplier_job.locationID AND (jobStatus='online' OR jobStatus='pending') GROUP BY supplier_job.locationID";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
             echo "<li><a href='./worker_search.php?keyword=".$row['locCity']."&select_area=1&select_category=1' class='justify-content-between d-flex'>
                    <p>".$row['locCity']."</p>
                    <span>".$row['locCount']."</span></a>
                    </li>";
        }   
        
    }
                
?>
