<?php
    /*Vsitor Function*/
    
    /*View all top ranked workers*/

    $queryWorker="SELECT * FROM worker ORDER BY workerRank DESC LIMIT 5";
    $resultWorker=mysqli_query($conn,$queryWorker);

    if(mysqli_num_rows($resultWorker)>0){
        while($rowWorker=mysqli_fetch_assoc($resultWorker)){

            $rank=$rowWorker['workerRank'];
            $starArray=[];

            if($rank>7){
                $starArray=['fa fa-star','fa fa-star','fa fa-star','fa fa-star'];
            }else if($rank>5){
                $starArray=['fa fa-star','fa fa-star','fa fa-star','fa fa-star-half-full'];
            }else if($rank>3){
                $starArray=['fa fa-star','fa fa-star','fa fa-star-half-full','fa fa-star-half-full'];
            }else{
                $starArray=['fa fa-star','fa fa-star-half-full','fa fa-star-half-full','fa fa-star-half-full'];
            }


            
            echo "<a href='#' class='list-group-item'>
                        <i class='fa fa-bolt fa-fw'></i>Mr. ".$rowWorker['workerName']."
                        <p>
                           <i class='fa fa-phone' aria-hidden='true'>+94".$rowWorker['workerPhone']."</i>
                        </p>
                        <p>
                            <i class='fa fa-star' style='font-size:200%;color:green'></i>
                            <i class='".$starArray[0]."' style='font-size:200%;color:green'></i>
                            <i class='".$starArray[1]."' style='font-size:200%;color:green'></i>
                            <i class='".$starArray[2]."' style='font-size:200%;color:green'></i>
                            <i class='".$starArray[3]."' style='font-size:200%;color:green'></i>
                            
                        </p>
                        <div style='text-align:right'>
                        <button data-target='#send_job_request_modal' data-toggle='modal' class='btn btn-primary' style='width:40%'>Send Request</button>
                        </div>
                    </a>";
            
        }
    }
                
?>
