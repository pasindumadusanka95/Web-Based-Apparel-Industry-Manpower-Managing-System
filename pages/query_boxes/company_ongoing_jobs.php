<?php
    /*Company Function*/
    
    /*View all supplier jobs where job state is start*/

    $queryJob="SELECT * FROM supplier_job WHERE jobStatus='start'";
    $resultJob=mysqli_query($conn,$queryJob);

    if(mysqli_num_rows($resultJob)>0){
        while($rowJob=mysqli_fetch_assoc($resultJob)){
            $totalDays=$rowJob['jobPeriod'];
            
            echo "<tr>
                    <td>".$rowJob['jobID']."</td>
                    <td>".$rowJob['jobTitle']."</td>
                    <td>".$rowJob['jobStatus']."</td>
                    <td>".$rowJob['jobCount']."</td>
                    <td>".$rowJob['jobProgress']."%</td>
                    <td><button style='margin:2px' class='btn btn-danger' data-target='#".$rowJob['jobID']."' data-toggle='modal'>Update</button></td>
                </tr>
                ";

            echo "<div>
                <div class='modal fade' id='".$rowJob['jobID']."' role='dialog'>
                    <div class='modal-dialog'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                           <h3>Update Progress <small>".$rowJob['jobTitle']."</small></h3>
                        </div>                       
                        <div class='modal-body'>
                            <form action='./query_boxes/company_update_progress.php' autocomplete='on' method='post'>
                                <div  class='form-group'>
                                    <lable>Job ID<lable>
                                    <input value='".$rowJob['jobID']."' type='text' class='form-control' name='jobID' required readonly>
                                </div>
                                
                                <div class='form-group'>
                                    <lable>Job Progress<lable>
                                    <input value='".$rowJob['jobProgress']."' type='text' class='form-control' name='jobProgress' required>
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
            
        }
    }
                
?>
