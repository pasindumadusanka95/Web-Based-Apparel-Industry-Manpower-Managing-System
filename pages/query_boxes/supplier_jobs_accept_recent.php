<?php
    /*Supplier Function*/
    
    /*View all recent supplier jobs*/

    $queryJob="SELECT * FROM supplier_job WHERE (jobStatus='online' OR jobStatus='pending') order by jobID DESC LIMIT 3";
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
                echo "<div class='single-post d-flex flex-row'><div class='thumb'>
				    <img src='../img/img-worker/post.png' alt=''>
                    </div>
                <div class='details'>
                    <div class='title d-flex flex-row justify-content-between'>
                        <div class='titles'>
                            <a href=''><h4>".$rowJob['jobTitle']."<small> Published on ".$rowJob['jobPublished']."</small></h4></a>
                            <h6>By ".$locationName."</h6>					
                        </div>
                        <ul>
                            <li><a href='#' class='btn btn-primary' data-target='#apply".$rowJob['jobID']."' data-toggle='modal'>Apply</a></li>
                        </ul>
                    </div>
                    <p >".$rowJob['jobCount']." pieces needs to do ".$rowJob['jobType'].". Every manpower member has to work at most ".$rowJob['jobPeriod']." days. 
                    <strong></strong> Job should be complete within ".$rowJob['jobPeriod']." days.</p>

                    <h5>Job Nature: ".$rowJob['jobNature']."</h5>
                    <p class='address'><span class=''></span>".$locationAddress."</p>
                    <p class='address'><span class=''></span>".$rowJob['workersJoined']." joined.</p>
                </div></div>";
                
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
                echo "<div class='single-post d-flex flex-row'><div class='thumb'>
				    <img src='../img/img-worker/post.png' alt=''>
                    </div>
                <div class='details'>
                    <div class='title d-flex flex-row justify-content-between'>
                        <div class='titles'>
                            <a href=''><h4>".$rowJob['jobTitle']."<small> Published on ".$rowJob['jobPublished']."</small></h4></a>
                            <h6>By ".$locationName."</h6>					
                        </div>
                        <ul>
                            <li><a class='btn btn-primary' href='./query_boxes/worker_accept_jobs.php?jobID=".$rowJob['jobID']."'>Apply</a></li>
                        </ul>
                    </div>
                    <p >".$rowJob['jobCount']." pieces needs to do ".$rowJob['jobType'].". Every manpower member has to work at most ".$rowJob['jobPeriod']." days. 
                    <strong></strong> Job should be complete within ".$rowJob['jobPeriod']." days.</p>

                    <h5>Job Nature: ".$rowJob['jobNature']."</h5>
                    <p class='address'><span class=''></span>".$locationAddress."</p>
                    <p class='address'><span class=''></span>".$rowJob['workersJoined']." joined.</p>
                </div></div>";
            }           
            
          
        }
    }
                
?>
