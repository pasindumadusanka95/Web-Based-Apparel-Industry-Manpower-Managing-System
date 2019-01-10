<?php
    /*Supplier Function*/
    
    /*View all started jobs of supplier*/

    $queryJob="SELECT * FROM supplier_job WHERE jobStatus='start' LIMIT 10";
    $resultJob=mysqli_query($conn,$queryJob);

    if(mysqli_num_rows($resultJob)>0){
        while($rowJob=mysqli_fetch_assoc($resultJob)){

            $locationID=$rowJob['locationID'];
            $queryLocation="SELECT * FROM location WHERE locID='$locationID'";
            $resultLocation=mysqli_query($conn,$queryLocation);

            $rowLocation=mysqli_fetch_assoc($resultLocation);
            $locationName=$rowLocation['locName'];
            $locationAddress=$rowLocation['locStreet'].", ".$rowLocation['locVillage'].", ".$rowLocation['locCity'];
            
            $level="danger";
           if($rowJob['jobProgress']>75){
               $level="primary";
           }else if($rowJob['jobProgress']>50){
               $level="success";
           }else if($rowJob['jobProgress']>25){
               $level="warning";
           }
            $prev=((int)$rowJob['jobProgress']/100)*$rowJob['jobCount'];
            
            echo "<div class='progress-group'>
                      ".$rowJob['jobTitle']." <small>by ".$rowJob['comID']."</small>
                      <span class='float-right'><b>".$rowJob['jobProgress']."</b>/100</span>
                      
                      <div class='progress progress-sm'>
                        <div class='progress-bar bg-".$level."' style='width: ".$rowJob['jobProgress']."%'></div>
                      </div>
                      <div style='text-align:right'>
                        <button data-target='#".$rowJob['jobID']."' data-toggle='modal' style='margin:5px 2px 2px 0' class='btn btn-success'>Update</button>
                        <button data-target='#complete".$rowJob['jobID']."' data-toggle='modal' style='margin:5px 2px 2px 0' class='btn btn-primary'>Complete</button>
                        <button style='margin:5px 0 2px 0' class='btn btn-danger'>Cancel</button>
                    </div>
                    </div>
                    <!-- /.progress-group -->";
            
             echo "<div>
                <div class='modal fade' id='".$rowJob['jobID']."' role='dialog'>
                    <div class='modal-dialog'>
                      <div class='modal-content'>
                        <div class='modal-header bg-success'>
                           <h3>Update Progress of<small> ".$rowJob['jobID']." ".$rowJob['jobTitle']."</small></h3>
                        </div>                       
                        <div class='modal-body'>
                            <form action='./query_boxes/company_update_progress.php' autocomplete='on' method='post'>
                                <div  class='form-group' style='display:none'>
                                    <input value='".$rowJob['jobID']."' type='text' class='form-control' name='jobID' required readonly>
                                </div>
                                <div class='form-group' style='display:none'>
                                    <input value='$prev' type='text' class='form-control' name='prevProgress' required>
                                </div>
                                <div class='form-group' style='display:none'>
                                    <input value='".$rowJob['jobCount']."' type='text' class='form-control' name='jobCount' required>
                                </div>
                                <div class='form-group'>
                                    <lable>Enter Amount Done<lable>
                                    <input value='$prev' type='text' class='form-control' name='jobProgress' required>
                                </div>
                                <div class='form-group'>
                                    <input type='submit' class='form-control btn btn-success' style='width:100%'' value='Update' name='updateJob' required>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>";
            
            echo "<div>
                <div class='modal fade' id='complete".$rowJob['jobID']."' role='dialog'>
                    <div class='modal-dialog'>
                      <div class='modal-content'>
                        <div class='modal-header bg-primary'>
                           <h3>Complete the job <small> ".$rowJob['jobID']." ".$rowJob['jobTitle']."</small></h3>
                        </div>                       
                        <div class='modal-body'>
                            <form action='./query_boxes/supplier_complete_job.php' autocomplete='on' method='post'>
                                <div  class='form-group' style='display:none'>
                                    <input value='".$rowJob['jobID']."' type='text' class='form-control' name='jobID' required readonly>
                                </div>
                                <div class='form-group'>
                                    <lable>Enter Per Day Payment (Rs.)<lable>
                                    <input value=0 type='text' class='form-control' name='unitPrice' required>
                                </div>
                                <div class='form-group'>
                                    <input type='submit' class='form-control btn btn-primary' style='width:100%'' value='Complete' name='completeJob' required>
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
