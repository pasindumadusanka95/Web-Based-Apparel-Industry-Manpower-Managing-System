<?php
    /*Supplier Function*/
    
    /*View all supplier jobs for visitors*/

    $queryJob="SELECT * FROM supplier_job WHERE jobStatus='online' OR jobStatus='pending' ORDER BY jobID DESC LIMIT 5";
    $resultJob=mysqli_query($conn,$queryJob);

    if(mysqli_num_rows($resultJob)>0){
        while($rowJob=mysqli_fetch_assoc($resultJob)){

            $locationID=$rowJob['locationID'];
            $queryLocation="SELECT * FROM location WHERE locID='$locationID'";
            $resultLocation=mysqli_query($conn,$queryLocation);

            $rowLocation=mysqli_fetch_assoc($resultLocation);
            $locationName=$rowLocation['locName'];
            $locationAddress=$rowLocation['locStreet'].", ".$rowLocation['locVillage'].", ".$rowLocation['locCity'];
                        
            
            echo "<div class='col-lg-4 mb-4'><div class='card h-100'>
            <h4 class='card-header'>".$rowJob['jobTitle']."</h4>
            <div class='card-body'>
                <p class='card-text'>".$rowJob['jobCount']." pieces needs to do ".$rowJob['jobType'].".Manpower members have to work at 
                    <strong><a href='#'>".$locationName.", ".$locationAddress.".</a></strong> Job should be complete within ".$rowJob['jobPeriod']." days
                </p>
                    
                <p class='card-text'>Published on <font style='color:green;'>".$rowJob['jobPublished']."</font>
                </p>
            </div>
            <div class='card-footer'>
              <a href='./pages/login.php' class='btn btn-primary'>Let's Join</a>
            </div>
          </div></div>";
            
            
          
        }
    }
                
?>
