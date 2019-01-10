<?php
    /*Company Function*/
    
    /*View all invoice count*/
    $userID=$_SESSION['userID'];
    $query="SELECT COUNT(invoiceID) AS invoiceCount FROM invoice WHERE userID='$userID'";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo $row['invoiceCount'];
    }

    
        
?>