<?php
if(isset($_POST['addComJob'])){ 
    require_once('../../db_config/config.php');
    $jobTitle= $_POST['jobTitle'];
    $jobType = $_POST['jobType'];
    $jobAmount = $_POST['jobAmount'];
    $jobPeriod = $_POST['jobPeriod'];
    $jobPrice = $_POST['jobPrice'];
    $jobDate = $_POST['jobDate'];
    $jobStatus = $_POST['jobStatus'];
    $comID = $_POST['comID'];
    $supID = $_POST['supID'];
    $locID = $_POST['locID'];

    $query = "INSERT INTO company_job (jobTitle,jobType,jobAmount,jobPeriod,jobPrice,jobDate,jobStatus,comID,supID,locID) VALUES ('$jobTitle','$jobType','$jobAmount','$jobPeriod','$jobPrice','$jobDate','$jobStatus','$comID','$supID','$locID')";
    if(mysqli_query($conn,$query)){
        echo "Data Inserted successfully...!!";
    }
    else{
        echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
    }
    mysqli_close($conn);
}

if(isset($_GET['jobID'])){
    require_once('../../db_config/config.php');
    $jobID=$_GET['jobID'];
    $jobTitle= $_POST['jobTitle'];
    $jobType = $_POST['jobType'];
    $jobAmount = $_POST['jobAmount'];
    $jobPeriod = $_POST['jobPeriod'];
    $jobPrice = $_POST['jobPrice'];
    
    echo $jobID;
    $query = "UPDATE company_job SET jobTitle='$jobTitle' , jobType='$jobType',jobAmount='$jobAmount',jobPeriod='$jobPeriod',jobPrice='$jobPrice' WHERE jobID=$jobID";
    if(mysqli_query($conn,$query))
    {
     echo "Data Updated successfully...!!";
    }
    else{
     echo "<p>Update Failed <br/> Some Fields are Blank....!!</p>";
    }
    mysqli_close($conn);   
}




function viewOngoingCompanyJobs(){
    
}
 

function viewCancledCompanyJobs(){
    require_once('../db_config/config.php');
    $queryJob="SELECT * FROM company_job WHERE jobStatus='cancle' LIMIT 10";
    $resultJob=mysqli_query($conn,$queryJob);

    if(mysqli_num_rows($resultJob)>0){
        while($rowJob=mysqli_fetch_assoc($resultJob)){
            
            echo "<div class='btn btn-default' style='text-align:left;width:60%;height:100%;border-left:6px solid red;background-color:rgb(239, 240, 242,0.5);margin:0 0 5px 0;padding:0 0 0 4px' data-target='#update_company_job_modal' data-toggle='modal'>
                <strong>
                    <font style='font-size:15px'>
                        <p>".$rowJob['jobTitle']."</p>
                    </font>
                </strong>
                <p >".$rowJob['jobAmount']." pieces needs to do ".$rowJob['jobType'].". Every manpower member has to work at 
                   
                </p>
                <p>Published on <font style='color:green;'>".$rowJob['jobDate']."</font>
                </p>
                </div>";

        }
    }
    mysqli_close($conn);
}


?>