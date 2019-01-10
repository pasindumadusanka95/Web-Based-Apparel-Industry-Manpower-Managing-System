<?php
    /*Company Function*/
    
    /*View all company jobs where job state is offline*/

    $queryJob="SELECT * FROM company_job WHERE jobStatus='offline'";
    $resultJob=mysqli_query($conn,$queryJob);

    if(mysqli_num_rows($resultJob)>0){
        while($rowJob=mysqli_fetch_assoc($resultJob)){
            $date=date("y-m-d");
            echo "<tr>
                    <td>".$rowJob['jobID']."</td>
                    <td>".$rowJob['jobTitle']."</td>
                    <td>".$rowJob['jobType']."</td>
                    <td>".$rowJob['jobAmount']."</td>
                    <td>".$rowJob['jobPeriod']."</td>
                    <td>".$rowJob['jobPrice']."</td>
                    <td>".$rowJob['jobDate']."</td>
                    <td><button style='margin:2px' class='btn btn-success' data-target='#".$rowJob['jobID']."' data-toggle='modal'>Update</button>
                    <button class='btn btn-danger'  data-target='#cancel_job" . $rowJob['jobID'] . "' data-toggle='modal' >Cancel</button></td>
                </tr>";
            
            echo "<div>
                    <div class='modal fade' id='".$rowJob['jobID']."' role='dialog'>
                        <div class='modal-dialog'>
                          <div class='modal-content'>
                            <div class='modal-header bg-success'>
                               <h3>Update Job ID ".$rowJob['jobID']."</h3>
                            </div>
                            
                            <div class='modal-body'>
                                <form action='./query_boxes/company_published_jobs_update.php' autocomplete='on' method='post'>
                                    <div style='display:none' class='form-group'>
                                        <lable>Job ID<lable>
                                        <input value='".$rowJob['jobID']."' type='text' class='form-control' name='jobID' required>
                                    </div>
                                    <div class='form-group'>
                                        <lable>Job Title<lable>
                                        <input value='".$rowJob['jobTitle']."' type='text' class='form-control' name='jobTitle' required>
                                    </div>
                                    <div class='form-group'>
                                        <lable>Job Type<lable>
                                        <input value='".$rowJob['jobType']."' type='text' class='form-control' name='jobType' required>
                                    </div>
                                    <div class='form-group'>
                                        <lable>Job Quantity (Pieces)<lable>
                                        <input value='".$rowJob['jobAmount']."' type='number' class='form-control' name='jobAmount' required>
                                    </div>
                                    <div class='form-group'>
                                        <lable>Job Duration<lable>
                                        <input value='".$rowJob['jobPeriod']."' type='number' class='form-control' name='jobPeriod' required>
                                    </div>
                                    <div class='form-group'>
                                        <lable>Job Price (Rs)<lable>
                                        <input value='".$rowJob['jobPrice']."' type='number' class='form-control' name='jobPrice' required>
                                    </div>
                                     
                                    <div class='form-group'>
                                        <input type='submit' class='form-control btn btn-success' style='width:100%'' value='Change Job Details' name='publishedJobUpdate' required>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>";

            echo "<div>
                    <div class='modal fade' id='cancel_job" . $rowJob['jobID'] . "' role='dialog'>
                        <div class='modal-dialog'>
                          <div class='modal-content' style='width: 70%'>
                            <div class='modal-body'>
                          
                                <form action='./query_boxes/cancel_company_job.php' autocomplete='on' method='post'>
                                    <div style='display:none' class='.d-none'>
                                        
                                        <input value='" . $rowJob['jobID'] . "' type='text' class='form-control hidden' name='jobID' required>
                                    </div>
                                     
                                   
                                     
                                    <div class='form-group' style='margin-top: 25px'>
                                          <lable>Do you want to cancel this '".$rowJob['jobTitle']."' job?<lable>
                                      
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
                
?>
