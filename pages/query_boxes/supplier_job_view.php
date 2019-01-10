<?php
    /*Supplier Function*/
    
    /*View all supplier jobs*/

    $jobID=$_SESSION['jobID'];
    $queryJob="SELECT * FROM supplier_job WHERE jobId='$jobID'";
    $resultJob=mysqli_query($conn,$queryJob);

    if(mysqli_num_rows($resultJob)>0){
                    
        echo "<div style='border-radius:10px;width:100%;height:100%;border-left:6px solid red;background-color:rgb(239, 240, 242,0.5);margin:0 0 5px 0;padding:0 0 0 4px'>
            <strong>
                <font style='font-size:15px'>
                    <p>".$rowJob['jobTitle']."</p>
                </font>
            </strong>
            <p >".$rowJob['jobCount']." pieces needs to do ".$rowJob['jobType'].". Every manpower member has to work at 
                <strong><a href='#'>".$locationName.", ".$locationAddress.".</a></strong> Job should be complete within ".$rowJob['jobPeriod']." days

            </p>
            <p>Published on <font style='color:green;'>".$rowJob['jobPublished']."</font>
            </p>
            <p>
                <button  class='btn btn-success' data-target='#signin_modal' data-toggle='modal'>join</button> (<font style='color:red;'>".$rowJob['jobPeriod']."</font>/".($rowJob['workerCount']+5).") joined
            </p>
            </div>";
          
        
    }
                
?>
