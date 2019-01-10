<?php
    /*Supplier Function*/
    
    /*View all pending supplier jobs*/

    $queryJob="select DISTINCT supplier_job.workerCount,supplier_job.jobID,supplier_job.comID,supplier_job.jobTitle from company,supplier_job,worker_pending where worker_pending.jobID=supplier_job.jobID AND supplier_job.jobStatus='pending' AND  company.comID=supplier_job.comID";
    $resultJob=mysqli_query($conn,$queryJob);

    if(mysqli_num_rows($resultJob)>0){
        while($rowJob=mysqli_fetch_assoc($resultJob)){
            $jobID=$rowJob['jobID'];
            $query="select count(workerID) as workerCount from worker_pending where jobID='$jobID'";
            $resultCount=mysqli_query($conn,$query);
            $rowCount=mysqli_fetch_assoc($resultCount);
            
            $level="danger";
            $value=(((int)$rowCount['workerCount'])/((int)$rowJob['workerCount']))*100;
           if($value>75){
               $level="primary";
           }else if($value>50){
               $level="success";
           }else if($value>25){
               $level="warning";
           }
            
            echo "<div class='progress-group'>
                      ".$rowJob['jobTitle']." <small>by ".$rowJob['comID']."</small>
                      <span class='float-right'><b>".$rowCount['workerCount']."</b>/".$rowJob['workerCount']."</span>
                      
                      <div class='progress progress-sm'>
                        <div class='progress-bar bg-".$level."' style='width: ".$value."%'></div>
                      </div>
                      <div style='text-align:right'>
                        <button data-target='#start".$rowJob['jobID']."' data-toggle='modal' style='margin:5px 2px 2px 0' class='btn btn-primary'>Start</button>
                        <button style='margin:5px 0 2px 0' class='btn btn-danger'> Cancel</button>
                    </div>
                    </div>
                    <!-- /.progress-group -->";
            echo "<div>
                <div class='modal fade' id='start".$rowJob['jobID']."' role='dialog'>
                    <div class='modal-dialog'>
                      <div class='modal-content'>
                        <div class='modal-header bg-primary'>
                           <h3>Start the job <small> ".$rowJob['jobID']." ".$rowJob['jobTitle']."</small></h3>
                        </div>                       
                        <div class='modal-body'>
                            <form action='./query_boxes/supplier_start_job.php' autocomplete='on' method='post'>
                                <div  class='form-group' style='display:none'>
                                    <input value='".$rowJob['jobID']."' type='text' class='form-control' name='jobID' required readonly>
                                </div>
                                <div class='form-group'>
                                    <lable>Do you want to start the ".$rowJob['jobTitle']."?<lable>
                                </div>
                                </div>
                                      <div class=\"modal-footer\">
                                        <input type='submit' class='form-control btn btn-primary' style='width:25%'' value='Yes' name='startJob' required>
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
