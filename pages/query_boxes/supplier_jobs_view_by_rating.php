<?php
    /*Supplier Function*/
    
    /*View all supplier jobs by ratings*/

    $queryJob="SELECT * FROM supplier_job WHERE (jobStatus='online' OR jobStatus='pending') AND jobRatings>2 order by jobID DESC";
    $resultJob=mysqli_query($conn,$queryJob);
    $userStatus=$_SESSION['userStatus'];
    if(mysqli_num_rows($resultJob)>0){
        while($rowJob=mysqli_fetch_assoc($resultJob)){

            $locationID=$rowJob['locationID'];
            $queryLocation="SELECT * FROM location WHERE locID='$locationID'";
            $resultLocation=mysqli_query($conn,$queryLocation);

            $rowLocation=mysqli_fetch_assoc($resultLocation);
            $locationName=$rowLocation['locName'];
            $locationAddress=$rowLocation['locStreet'].", ".$rowLocation['locVillage'].", ".$rowLocation['locCity'];
            
              
            if($userStatus=="offline"){
                 echo "<div class='single-rated'>
                    <h4>".$rowJob['jobTitle']."</h4>
                    <h6>".$locationName."</h6>
                   <p >".$rowJob['jobCount']." pieces needs to do ".$rowJob['jobType'].". Every manpower member has to work at most ".$rowJob['jobPeriod']." days. 
                    <strong></strong> Job should be complete within ".$rowJob['jobPeriod']." days.</p>
                    
                    <h5>Job Nature: ".$rowJob['jobNature']."</h5>
                    <p class='address'><span class='lnr lnr-map'></span> ".$locationAddress."</p>
                    <p class='address'><span class='lnr lnr-database'></span> ".$rowJob['workersJoined']." joined.</p>
                    <a href='#' class='btn btn-primary' data-target='#apply".$rowJob['jobID']."' data-toggle='modal' class='btn btn-primary'>Apply job</a>
                </div>";
                
                echo "<!-- worker leave -->
                    <div>
                    <div class='modal fade' id='apply".$rowJob['jobID']."' role='dialog'>
                        <div class='modal-dialog'>
                          <div class='modal-content' style='width: 100%'>
                          <div class='modal-header bg-danger' style='color:white'>Warning!</div>
                            <div class='modal-body'>
                          
                                <form action='#' autocomplete='on' method='post'>
                                    <div style='display:none' class='.d-none'>
                                        
                                        <input value='".$rowJob['jobID']."' type='text' class='form-control hidden' name='jobID' required>
                                    </div>
                                     
                                    <div class='form-group' style='margin-top: 25px'>
                                        <lable>Sorry! You can not join for another job while you are in a job.</lable>
                                      
                                    </div>
                                      <div class='modal-footer'>
                                        <input class='form-control btn btn-danger' style='width:25%' value='OK' data-dismiss='modal' required>
                                    </div>
                                   
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>";
                
            }  else{
                 echo "<div class='single-rated'>
                    <h4>".$rowJob['jobTitle']."</h4>
                    <h6>".$locationName."</h6>
                   <p >".$rowJob['jobCount']." pieces needs to do ".$rowJob['jobType'].". Every manpower member has to work at most ".$rowJob['jobPeriod']." days. 
                    <strong></strong> Job should be complete within ".$rowJob['jobPeriod']." days.</p>
                    
                    <h5>Job Nature: ".$rowJob['jobNature']."</h5>
                    <p class='address'><span class='lnr lnr-map'></span> ".$locationAddress."</p>
                    <p class='address'><span class='lnr lnr-database'></span> ".$rowJob['workersJoined']." joined.</p>
                    <a href='./query_boxes/worker_accept_jobs.php?jobID=".$rowJob['jobID']."' class='btn btn-primary'>Apply job</a>
                </div>";
            }    
           
            
            
          
            /*
            
            <div style='text-align:right'>
                    <p>(<font style='color:red;'>".$rowJob['jobPeriod']."</font>/".($rowJob['workerCount']+5).") joined
                        <a href='./query_boxes/worker_accept_jobs.php?jobID=".$rowJob['jobID']."'><button id='join_btn' class='btn btn-success' onclick="."show_div('job')".">Accept & Join</button></a>
                    </p>
                </div>
                </div>
            */
            
            
                                
            
          
        }
    }
                
?>
