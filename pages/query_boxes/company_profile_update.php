<?php
    /*Company Function*/
    
    /*Update company profile*/

	if(isset($_POST['save'])){ 
	   	require_once '../../db_config/config.php';
	    $comID = $_POST['comID'];
		$comName = $_POST['comName'];
	    $comPhone = $_POST['comPhone'];
	    $comAddress = $_POST['comAddress'];
	    $comEmail = $_POST['comEmail'];
	    	
        $query = "UPDATE company SET comName='$comName',comPhone='$comPhone',comAddress='$comAddress',comEmail='$comEmail' WHERE comID='$comID'";
            if(mysqli_query($conn,$query))
            {
             echo "Data Updated successfully...!!";
            }
            else{
             echo "<p>Update Failed <br/> Some Fields are Blank....!!</p>";
            }
        }
?>