<?php
    /*Supplier Function*/
    
    /*View all supplier jobs by job type*/

    $query="SELECT jobType,COUNT(*) AS typeCount FROM supplier_job WHERE jobStatus='online' OR jobStatus='pending' GROUP BY jobType";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
             echo "<li><a href='./worker_search.php?keyword=".$row['jobType']."&select_area=1&select_category=1' class='justify-content-between d-flex'>
                    <p>".$row['jobType']."</p>
                    <span>".$row['typeCount']."</span></a>
                    </li>";
        }   
        
    }
                
?>
