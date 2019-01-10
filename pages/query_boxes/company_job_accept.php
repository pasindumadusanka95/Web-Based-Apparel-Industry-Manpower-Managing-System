<?php
    /*Supplier Function*/
    
    /*View offline compnay jobs whih state is offline*/

    $queryJob="SELECT * FROM company_job,company WHERE company_job.jobStatus='offline' AND company_job.comID=company.comID ORDER BY jobID DESC LIMIT 10";
    $resultJob=mysqli_query($conn,$queryJob);

    if(mysqli_num_rows($resultJob)>0){
        while($rowJob=mysqli_fetch_assoc($resultJob)){
            $date=date("y-n-d");
            echo "<tr>
                      <td><a href='others/examples/invoice.html'>".$rowJob['jobID']."</a></td>
                      <td>".$rowJob['jobTitle']."</td>
                      <td>".$rowJob['jobAmount']." Pieces</td>
                      <td>".$rowJob['jobPeriod']." Days</td>
                      <td>RS. <span class='badge badge-danger'>".$rowJob['jobPrice']."</span></td>
                      <td>".$rowJob['jobDate']."</td>
                      <td>".$rowJob['comName']."</td>
                      <td style='text-align:right'>
                        <button style='margin:6px'  class='btn btn-primary' data-target='#".$rowJob['jobID']."' data-toggle='modal'>+Publish</button>
                        <button style='margin:6px' class='btn btn-danger' data-target='#reject".$rowJob['jobID']."' data-toggle='modal'>Reject</button>
                        </td>
                    </tr>";
            
            echo "<div>
                    <div class='modal fade' id='".$rowJob['jobID']."' role='dialog'>
                        <div class='modal-dialog'>
                          <div class='modal-content'>
                            <div class='modal-header bg-primary'>
                               <h3>+Publish Company Job <small>".$rowJob['jobID']."</small></h3>
                            </div>
                            
                            <div class='modal-body'>
                                <form action='./query_boxes/supplier_publish_jobs.php' autocomplete='on' method='post'>
                                    <div style='display:none' class='form-group'>
                                        <lable>Job Title<lable>
                                        <input value='".$rowJob['jobID']."' type='text' class='form-control' name='jobID' required>
                                    </div>
                                    <div class='form-group'>
                                        <lable>Job Title<lable>
                                        <input value='".$rowJob['jobTitle']."' type='text' class='form-control' name='jobTitle' required>
                                    </div>
                                    <div class='form-group'>
                                        <lable>Job Type<lable>
                                        <input value='".$rowJob['jobType']."' type='text' class='form-control' name='jobType' required readonly>
                                    </div>
                                    <div class='form-group'>
                                        <lable>Job Quantity<lable>
                                        <input value='".$rowJob['jobAmount']."' type='text' class='form-control' name='jobAmount' required>
                                    </div>
                                    <div class='form-group'>
                                        <lable>Job Duration<lable>
                                        <input value='".$rowJob['jobPeriod']."' type='text' class='form-control' name='jobPeriod' required>
                                    </div>
                                    <div class='form-group'>
                                        <lable>Enter Worker Count<lable>
                                        <input type='number' class='form-control' name='workerCount' required>
                                    </div>
                                    <div class='form-group'>
                                        <lable>Enter Location ID<lable>
                                        <input type='number' class='form-control' name='locID' required>
                                    </div>
                                    <div style='display:none' class='form-group'>
                                        <lable>Company ID<lable>
                                        <input value='".$rowJob['comID']."' type='text' class='form-control' name='compID' required readonly>
                                    </div>
                                    <div class='form-group'>
                                        <lable>Enter Job Nature</lable>
                                        <input value='Full Time' type='text' class='form-control' name='jobNature' required>
                                    </div>
                                    <div style='display:none' class='form-group'>
                                        <input value='".$rowJob['supID']."' type='text' class='form-control' name='suppID' required readonly>
                                    </div>
                                    <div style='display:none' class='form-group'>
                                        <lable>Job Publishing Date<lable>
                                        <input value='$date' type='text' class='form-control' name='jobPublishedD' required>
                                    </div>
                                    <div style='display:none' class='form-group'>
                                        <input value='".$rowJob['jobID']."' type='text' class='form-control' name='comJobID' required>
                                    </div>
                                    <div style='display:none' class='form-group'>
                                        <input value='".$rowJob['jobPrice']."' type='text' class='form-control' name='jobPrice' required>
                                    </div>


                                    <div class='form-group'>
                                        <input type='submit' class='form-control btn btn-primary' style='width:100%'' value='Publish Job' name='publishJob' required>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>";
            
            echo "<div>
                    <div class='modal fade' id='reject".$rowJob['jobID']."' role='dialog'>
                        <div class='modal-dialog'>
                          <div class='modal-content' style='width: 70%'>
                            <div class='modal-header bg-danger'>Warning!</div>
                            <div class='modal-body'>
                          
                                <form action='./query_boxes/supplier_reject_job.php' autocomplete='on' method='post'>
                                    <div style='display:none' class='.d-none'>
                                        
                                        <input value='" .$rowJob['jobID']. "' type='text' class='form-control hidden' name='jobID' required>
                                    </div>
                                     
                                   
                                     
                                    <div class='form-group' style='margin-top: 25px'>
                                          <lable>Do you want to reject this '".$rowJob['jobTitle']."' job?<lable>
                                      
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
