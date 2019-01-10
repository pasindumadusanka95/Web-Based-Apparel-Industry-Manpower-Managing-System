<?php
    if(isset($_GET['search'])){
        $value=$_GET['search'];
        
        
        $query="SELECT * FROM worker WHERE workerID LIKE '$value%' OR workerName LIKE '$value%' OR workerPhone LIKE '$value' OR workerEmail LIKE '$value%'";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){

            $rank="danger";
            if($row['workerRank']>7){
                $rank="primary";
            }else if($row['workerRank']>5){
                $rank="success";
            }else if($row['workerRank']>3){
                $rank="warning";
            }
            
            $status="success";
            if($row['workerStatus']!='online'){
                $status="danger";
            }
            
            echo "<tr>
                  <td>".$row['workerID']."</td>
                  <td>".$row['workerName']."</td>
                  <td>".$row['workerNIC']."</td>
                  <td>".$row['workerPhone']."</td>
                  <td><lable class='btn btn-".$rank."'>".$row['workerRank']."</lable></td>
                  <td>".$row['workerEmail']."</td>
                  <td><lable class='btn btn-".$status."'>".$row['workerStatus']."</lable></td>
                  <td>
                    <div style='text-align:right'>
                            <form action='../../query_boxes/supplier_remove_worker.php' autocomplete='on' method='POST'>                        
                                <div class='form-group'>
                                    <input style='display:none' type='text' value='".$row['workerID']."' name='workerID' required>
                                    <input type='submit' class='form-control btn btn-danger' value='Remove' name='removeWorker' required>
                                </div>
                            </form>
                        </div>
                  </td>
                </tr>";
        }
        
    }

        
    }
    

?>