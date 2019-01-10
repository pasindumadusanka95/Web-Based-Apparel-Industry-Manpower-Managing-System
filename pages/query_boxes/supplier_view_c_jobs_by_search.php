<?php
    /*Supplier Function*/
    
    /*View all company jobs by search*/

    if(isset($_GET['type'])){
        $type=$_GET['type'];
        $upprice=$_GET['price'];
        $status=$_GET['status'];
        
        $query="SELECT * FROM company_job,company WHERE company_job.comID=company.comID AND (company_job.jobType='$type' AND (company_job.jobPrice>$upprice) AND company_job.jobStatus='$status') ORDER BY jobID DESC";
        
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){

                $status="danger";
                if($row['jobStatus']=='online'){//accept supplier
                    $status="success";
                }else if($row['jobStatus']=='cancel'){
                    $status="danger";
                }else if($row['jobStatus']=='offline'){
                    $status="warning";
                }else if($row['jobStatus']=='done'){
                    $status="primary";
                }
                echo "<tr>
                      <td>".$row['jobID']."</td>
                      <td>".$row['jobTitle']."</td>
                      <td>".$row['jobType']."</td>
                      <td>".$row['jobAmount']."</td>
                      <td>".$row['jobPeriod']."</td>
                      <td><lable class='btn btn-danger'>".$row['jobPrice']."</lable></td>
                      <td>".$row['jobDate']."</td>
                      <td><lable class='btn btn-".$status."'>".$row['jobStatus']."</lable></td>
                      <td>".$row['comName']." Pvt Ltd. Company</td>
                    </tr>";
            }

        }
        
    }
   


?>