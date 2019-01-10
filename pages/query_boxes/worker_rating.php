<?php
    /*Worker Function*/
    
    /*View ranked workers*/

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
            
        echo "<div class='col-lg-4 col-sm-6 portfolio-item'>
          <div class='card h-100' style='text-align: center'>
            
            <div class='card-body'>
              <h4 class='card-title'>
                Mr. ".$rowWorker['workerName']."<hr>
              </h4>
              Tel: ".$rowWorker['workerPhone']."
              
              
            </div>
          </div>
        </div>";
    }
    }
                
?>
