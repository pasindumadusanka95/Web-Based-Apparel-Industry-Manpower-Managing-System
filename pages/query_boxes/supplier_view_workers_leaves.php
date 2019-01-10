<?php
    /*Supplier Function*/
    
    /*View all worker leaves*/

    $query="SELECT * FROM worker_leaves,worker WHERE worker_leaves.workerID=worker.workerID";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
           
            
            echo "<tr>
                  <td>".$row['workerID']."</td>
                  <td>".$row['workerName']."</td>
                  <td>".$row['JobID']."</td>
                  <td>".$row['date']."</td>
                  <td>".$row['time']."</td>
                  
                </tr>";
        }
        
    }


?>