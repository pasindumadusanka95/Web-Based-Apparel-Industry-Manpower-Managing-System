<?php
    /*Supplier Function*/
    
    /*View all invoices*/

    $queryJob="SELECT * FROM invoice,worker,supplier_job WHERE invoice.workerID=worker.workerID && supplier_job.jobID=invoice.jobID && supplier_job.jobStatus='done'";
    $resultJob=mysqli_query($conn,$queryJob);

    if(mysqli_num_rows($resultJob)>0){
        while($rowJob=mysqli_fetch_assoc($resultJob)){

            echo "<div style='border-radius:10px;width:100%;height:100%;border-left:6px solid red;background-color:rgb(239, 240, 242,0.5);margin:0 0 5px 0;padding:0 0 0 4px'>
            <strong>
                
                <p>Job Number: ".$rowJob['jobID']." | ".$rowJob['jobTitle']."</p>
                <p>Ended On: ".$rowJob['jobEnd']."</p>
                
            
            <p>
                <button class='btn btn-success'>Print Invoice</button>
            </p>
            </div>";
        }
                    
        
          
        
    }
                
?>
