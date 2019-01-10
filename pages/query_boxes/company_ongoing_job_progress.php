<?php
    /*Company Function*/
    
    /*View all supplier jobs where job status is start*/
    
    $query="SELECT * FROM supplier_job WHERE jobStatus='start' ";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){
       while($row=mysqli_fetch_assoc($result) ){
           $value=$row['jobProgress'];
           $status="danger";
           if($value>=75){
               $status="primary";
           }
           elseif($value>=50){
              $status="success"; 
           }
           elseif($value>=25){
              $status="warning"; 
           }
           else{
               $status;
           }
        echo "<li>
                <a>
                    <div>
                        <p>
                            <strong>".$row['jobTitle']."</strong>
                            <span class='pull-right text-muted'>$value% Complete</span>
                        </p>
                        <div class='progress progress-striped active'>
                            <div class='progress-bar progress-bar-$status' role='progressbar' aria-valuenow='$value' aria-valuemin='0' aria-valuemax='100' style='width: $value%''>
                                
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li class='divider'></li>";
           
    }
    }

    
        
?>