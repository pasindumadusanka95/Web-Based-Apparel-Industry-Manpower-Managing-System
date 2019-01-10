<?php
    /*Company Function*/

    /*Company view and print invoices releated for him*/
    
    $userID=$_SESSION['userID'];
    $queryJob="SELECT * FROM invoice,supplier_job WHERE supplier_job.comID='$userID' AND supplier_job.jobID=invoice.jobID AND invoice.userID='$userID' AND supplier_job.jobStatus='done'";
    $resultJob=mysqli_query($conn,$queryJob);

    if(mysqli_num_rows($resultJob)>0){
        while($rowJob=mysqli_fetch_assoc($resultJob)){
            
            if($rowJob['isPaid']==1){
                 echo "<tr>
                    <td>".$rowJob['invoiceID']."</td>
                    <td>".$rowJob['jobID']."</td>
                    <td>".$rowJob['jobTitle']."</td>
                    <td>".$rowJob['price']."</td>
                    <td class='bg-success'>Paid</td>
                    <td><a href='../print/print.php?id=".$rowJob['invoiceID']."' target='_blank'><button class='btn btn-default'>Print</button></a></td>
                    
                </tr>";
            }else{
                 echo "<tr>
                    <td>".$rowJob['invoiceID']."</td>
                    <td>".$rowJob['jobID']."</td>
                    <td>".$rowJob['jobTitle']."</td>
                    <td>".$rowJob['price']."</td>
                    <td><button class='btn btn-primary'>Pay</button></td>
                    <td><a href='../print/print.php?id=".$rowJob['invoiceID']."' target='_blank'><button class='btn btn-default'>Print</button></a></td>
                    
                </tr>";
            }
            
            
           
        }
    }
?>