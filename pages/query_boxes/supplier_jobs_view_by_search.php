<?php
/*Supplier Function*/
    
/*View all supplier jobs by search keyword*/

if(isset($_GET['search']) or isset($_GET['keyword'])) {
    $value = $_GET['keyword'];
    $area = $_GET['select_area'];
    $category = $_GET['select_category'];
    $queryview = "SELECT * FROM supplier_job,location WHERE supplier_job.locationID=location.locID AND supplier_job.locationID=location.locID AND (supplier_job.jobStatus='online' OR supplier_job.jobStatus='pending') AND (supplier_job.jobTitle LIKE '$value' OR supplier_job.jobNature='$category' OR location.locCity='$area' OR location.locCity='$value' OR supplier_job.jobType='$value') ORDER BY supplier_job.jobID DESC";
    $userStatus=$_SESSION['userStatus'];
    $result = mysqli_query($conn,$queryview);
    if (mysqli_num_rows($result) > 0) {

        while ($rowJob = mysqli_fetch_assoc($result)) {

            $locationID = $rowJob['locationID'];
            $queryLocation = "SELECT * FROM location WHERE locID='$locationID'";
            $resultLocation = mysqli_query($conn, $queryLocation);

            $rowLocation = mysqli_fetch_assoc($resultLocation);
            $locationName = $rowLocation['locName'];
            $locStreet=$rowLocation['locStreet'];
            $locCity=$rowLocation['locCity'];
            $locVillage=$rowLocation['locVillage'];

            
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
                    <p >".$rowJob['jobCount']." pieces needs to do <label class='bg-warning'>".$rowJob['jobType'].".</label> Every manpower member has to work at most ".$rowJob['jobPeriod']." days. 
                    <strong></strong> Job should be complete within ".$rowJob['jobPeriod']." days.</p>

                    <h5>Job Nature: <label class='bg-warning'>".$rowJob['jobNature']."</label></h5>
                    <p class='address'>$locStreet, $locVillage, <label class='bg-warning'>".$locCity."</label></p>
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
                    <p class='address'>$locStreet, $locVillage, <label class='bg-warning'>".$locCity."</label>
                    <p class='address'>".$rowJob['workersJoined']." joined.</p>
                </div></div>";
            }


        }
    }else{
        echo "No any jobs found!";
    }
}
?>
