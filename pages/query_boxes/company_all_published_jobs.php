<?php
    /*Company Function*/
    
    /*View all company jobs*/

    $queryJob="SELECT * FROM company_job";
    $resultJob=mysqli_query($conn,$queryJob);

    if(mysqli_num_rows($resultJob)>0){
        while($rowJob=mysqli_fetch_assoc($resultJob)){
            $status="danger";
            if($rowJob['jobStatus']=="offline"){
                $status="warning";
            }else if($rowJob['jobStatus']=="online"){
                $status="success";
            }else if($rowJob['jobStatus']=="cancle"){
                $status="info";
            }else if($rowJob['jobStatus']=="rejected"){
                $status="danger";
            }else if($rowJob['jobStatus']=="done"){
                $status="primary";
            }
            
            $cost="danger";
            if($rowJob['jobPrice']>100000){
                $cost="primary";
            }else if($rowJob['jobPrice']>75000){
                $cost="info";
            }else if($rowJob['jobPrice']>50000){
                $cost="success";
            }else if($rowJob['jobPrice']>25000){
                $cost="warning";
            }
            
            $type="danger";
            if($rowJob['jobType']=="CPI"){
                $type="primary";
            }else if($rowJob['jobType']=="Cutting"){
                $type="info";
            }else if($rowJob['jobType']=="Ironing"){
                $type="success";
            }else if($rowJob['jobType']=="Mending"){
                $type="warning";
            }
            
            echo "<tr>
                    <td>".$rowJob['jobID']."</td>
                    <td>".$rowJob['jobTitle']."</td>
                    <td class='btn btn-$type' style='width:100%;border-radius:0'>".$rowJob['jobType']."</td>
                    <td>".$rowJob['jobAmount']."</td>
                    <td>".$rowJob['jobPeriod']."</td>
                    <td class='btn btn-$cost' style='width:100%;border-radius:0'>Rs. ".$rowJob['jobPrice']."</td>
                    <td>".$rowJob['jobDate']."</td>
                    <td class='btn btn-$status' style='width:100%;border-radius:0'>".$rowJob['jobStatus']."</td>
                    
                </tr>";
        }
    }
?>