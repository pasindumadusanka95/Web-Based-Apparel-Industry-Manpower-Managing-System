<?php
    /*Supplier Function*/
    
    /*View all locations by search keyword*/

    if(isset($_GET['search'])){
    $value=$_GET['search'];
   
    $queryLoc="SELECT * FROM location WHERE locID LIKE '$value%' OR locName LIKE '%$value%' OR locCity LIKE '%$value%' OR locVillage LIKE '$value%'";
    $resultLoc=mysqli_query($conn,$queryLoc);

    if(mysqli_num_rows($resultLoc)>0){
        while($rowLoc=mysqli_fetch_assoc($resultLoc)){
           
            
            echo "<tr>
                  <td>".$rowLoc['locID']."</td>
                  <td>".$rowLoc['locName']."</td>
                  <td>".$rowLoc['locStreet']."</td>
                  <td>".$rowLoc['locVillage']."</td>
                  <td>".$rowLoc['locCity']."</td>
                  <td><button style='margin:5px' class='btn btn-success' data-target='#".$rowLoc['locID']."' data-toggle='modal'>Edit</button><button style='margin:5px' class='btn btn-danger' data-target='#cancle".$rowLoc['locID']."' data-toggle='modal'>Remove</button></td>";
             echo "<div>
                    <div class='modal fade' id='".$rowLoc['locID']."' role='dialog'>
                        <div class='modal-dialog'>
                          <div class='modal-content'>
                            <div class='modal-header bg-success'>
                               <h3>Change Location <small> of ".$rowLoc['locID']."</small></h3>
                            </div>
                            
                            <div class='modal-body'>
                                <form action='../../query_boxes/supplier_update_location.php' autocomplete='on' method='post'>
                                    <div class='form-group'>
                                        <lable>Location ID<lable>
                                        <input value='".$rowLoc['locID']."' type='text' class='form-control' name='locID' required>
                                    </div>
                                    <div class='form-group'>
                                        <lable>Location Name<lable>
                                        <input value='".$rowLoc['locName']."' type='text' class='form-control' name='locName' required>
                                    </div>
                                    <div class='form-group'>
                                        <lable>Location Street<lable>
                                        <input value='".$rowLoc['locStreet']."' type='text' class='form-control' name='locStreet' required>
                                    </div>
                                    <div class='form-group'>
                                        <lable>Location Village<lable>
                                        <input value='".$rowLoc['locVillage']."' type='text' class='form-control' name='locVillage' required>
                                    </div>
                                    <div class='form-group'>
                                        <lable>Location City<lable>
                                        <input value='".$rowLoc['locCity']."' type='text' class='form-control' name='locCity' required>
                                    </div>
                                    
                                    <div class='form-group'>
                                        <input type='submit' class='form-control btn btn-success' style='width:100%'' value='Change' name='locUpdate' required>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>";
            
            echo "<div>
                    <div class='modal fade' id='cancle".$rowLoc['locID']."' role='dialog'>
                        <div class='modal-dialog'>
                          <div class='modal-content' style='width: 70%'>
                            <div class='modal-header bg-danger'>Warning!</div>
                            <div class='modal-body'>
                          
                                <form action='../../query_boxes/supplier_remove_location.php' autocomplete='on' method='post'>
                                    <div style='display:none' class='.d-none'>
                                        
                                        <input value='" . $rowLoc['locID'] . "' type='text' class='form-control hidden' name='locID' required>
                                    </div>
                                     
                                   
                                     
                                    <div class='form-group' style='margin-top: 25px'>
                                          <lable>Do you want to remove this '".$rowLoc['locName']."' location?<lable>
                                      
                                    </div>
                                      <div class=\"modal-footer\">
                                        <input type='submit' class='form-control btn btn-danger' style='width:25%'' value='Yes' name='CanceledJob' required>
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

        
    }
    

?>