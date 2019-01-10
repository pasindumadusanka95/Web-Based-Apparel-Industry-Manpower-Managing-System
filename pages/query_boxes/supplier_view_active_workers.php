<?php
    /*Supplier Function*/
    
    /*View all workers who joined in the pending jobs*/

    $query="SELECT * FROM worker WHERE workerStatus='offline'";
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
                  <td>".$row['workerPhone']."</td>
                  <td>".$row['workerEmail']."</td>
                  <td><lable class='btn btn-".$status."'>".$row['workerStatus']."</lable></td>
                  <td>
                    <a data-target='#".$row['workerID']."' data-toggle='modal'><button class='btn btn-danger'>Remove</button></a>
                  </td>
                </tr>";
            echo "<div>
                    <div class='modal fade' id='".$row['workerID']."' role='dialog'>
                        <div class='modal-dialog'>
                          <div class='modal-content' style='width: 70%'>
                            <div class='modal-header bg-danger'>Warning!</div>
                            <div class='modal-body'>
                            <form action='../../query_boxes/supplier_leave_worker.php' autocomplete='on' method='post'>
                                <div style='display:none' class='.d-none'>

                                    <input value='" . $row['workerID'] . "' type='text' class='form-control hidden' name='locID' required>
                                    <input value='" . $row['workerID'] . "' type='text' class='form-control hidden' name='locID' required>
                                </div>

                                <div class='form-group' style='margin-top: 25px'>
                                      <lable>Do you want to remove this '".$row['workerName']."' worker from his job?<lable>

                                </div>
                                  <div class=\"modal-footer\">
                                    <input type='submit' class='form-control btn btn-danger' style='width:25%'' value='Yes' name='leave' required>
                                    <input type='button' class='form-control btn btn-default' style='width:25%'' value='No' data-dismiss=\"modal\">
                                </div>

                            </form>
                          
                            </div>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
    }


?>