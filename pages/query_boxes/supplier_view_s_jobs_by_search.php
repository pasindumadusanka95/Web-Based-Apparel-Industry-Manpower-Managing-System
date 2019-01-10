<?php
    /*Supplier Function*/
    
    /*View all supplier job by search keyword*/

    if(isset($_GET['type'])){
        $type=$_GET['type'];
        $status=$_GET['status'];
        
        $query="SELECT * FROM supplier_job WHERE jobType='$type' AND jobStatus='$status' ORDER BY jobID DESC";
        
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
            
            $rank="danger";
            if($row['jobProgress']>75){
                $rank="primary";
            }else if($row['jobProgress']>50){
                $rank="success";
            }else if($row['jobProgress']>25){
                $rank="warning";
            }
            
            $status="danger";
            if($row['jobStatus']=='online'){
                $status="info";
            }else if($row['jobStatus']=='start'){
                $status="success";
            }else if($row['jobStatus']=='pending'){
                $status="warning";
            }else if($row['jobStatus']=='done'){
                $status="primary";
            }
            
            echo "<tr>
                  <td>".$row['jobID']."</td>
                  <td>".$row['jobTitle']."</td>
                  <td>".$row['jobType']."</td>
                  <td><lable class='btn btn-".$status."'>".$row['jobStatus']."</lable></td>
                  <td>".$row['jobStart']."</td>
                  <td>".$row['jobEnd']."</td>
                  <td>".$row['jobPublished']."</td>
                  <td><lable class='btn btn-".$rank."'>".$row['jobProgress']."</lable></td>
                  <td>".$row['locationID']."</td>
                  <td>".$row['comID']."</td>
                  <td>".$row['jobNature']."</td>
                  <td>".$row['workersJoined']."</td>
                  <td>".$row['jobRatings']."</td>
                </tr>";
        }
        
    }

    
    }
    

?>