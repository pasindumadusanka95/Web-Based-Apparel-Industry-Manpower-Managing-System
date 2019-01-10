<?php
    /*Company Function*/
    
    /*View all company jobs where job state is rejected*/


    $queryJob="SELECT * FROM company_job WHERE jobStatus='rejected'";
    $resultJob=mysqli_query($conn,$queryJob);

    if(mysqli_num_rows($resultJob)>0){
        while($rowJob=mysqli_fetch_assoc($resultJob)){
            $totalDays=$rowJob['jobPeriod'];
            
            echo "<tr>
                    <td>".$rowJob['jobID']."</td>
                    <td>".$rowJob['jobTitle']."</td>
                    <td>".$rowJob['jobType']."</td>
                    <td>".$rowJob['jobAmount']."</td>
                    <td>".$rowJob['jobPeriod']."</td>
                    <td>".$rowJob['jobPrice']."</td>
                    <td>".$rowJob['jobDate']."</td>
                    <td><button class='btn btn-danger' data-target='#delete_job" . $rowJob['jobID'] . "' data-toggle='modal' >Remove</button></td>
                </tr>";
            
            
            echo "<div>
                    <div class='modal fade' id='delete_job" . $rowJob['jobID'] . "' role='dialog'>
                        <div class='modal-dialog'>
                          <div class='modal-content' style='width: 70%'>
                            <div class='modal-body'>
                          
                                <form action='./query_boxes/delete_rejected_company_jobs.php' autocomplete='on' method='post'>
                                    <div style='display:none' class='.d-none'>
                                        
                                        <input value='" . $rowJob['jobID'] . "' type='text' class='form-control hidden' name='jobID' required>
                                    </div>
                                     
                                   
                                     
                                    <div class='form-group' style='margin-top: 25px'>
                                          <lable>Do you want to delete this '".$rowJob['jobTitle']."' job?<lable>
                                      
                                    </div>
                                      <div class=\"modal-footer\">
                                        <input type='submit' class='form-control btn btn-danger' style='width:25%'' value='Yes' name='DeleteJob' required>
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
