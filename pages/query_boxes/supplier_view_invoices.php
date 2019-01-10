<?php
    /*Supplier Function*/
    
    /*View all invoices reletaed to the invoices*/

    $queryLoc="SELECT * FROM invoice ";
    $resultLoc=mysqli_query($conn,$queryLoc);

    if(mysqli_num_rows($resultLoc)>0){
        while($rowLoc=mysqli_fetch_assoc($resultLoc)){
           $status='warning';
            $paid="Not Paid";
            if($rowLoc['isPaid']==1){
                $status='success';
                $paid="Paid";
            }
            echo "<tr>
                  <td>".$rowLoc['invoiceID']."</td>
                  <td>".$rowLoc['jobID']."</td>
                  <td>".$rowLoc['userID']."</td>
                  <td>".$rowLoc['price']."</td>
                  <td class='bg-$status'>$paid</td>
                  <td><a target='_blank' href='../../../print/print.php?id=".$rowLoc['invoiceID']."'><button style='margin-right:2px' class='btn btn-primary' >Print Invoice</button></a>
                  <a href='../../query_boxes/supplier_update_invoice.php?invID=".$rowLoc['invoiceID']."'><button class='btn btn-warning'>Pay</button>
                  </td>";
            
            
          
        }
    }
                
?>
