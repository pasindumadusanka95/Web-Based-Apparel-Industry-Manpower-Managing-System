<?php
    /*Supplier Function*/
    
    /*Change invoice's paid state to paid*/

    if(isset($_GET['invID'])){
        require_once('../../db_config/config.php');
        $invID=$_GET['invID'];
        
        $query="UPDATE invoice SET isPaid=1 WHERE invoiceID='$invID'";
        if(mysqli_query($conn,$query)){
           echo "<script>window.location.replace('../others/tables/dataInvoice.php');alert('Paid invoice ".$invID."!');</script>";
        }
    }


?>