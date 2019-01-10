<?php
    session_start();
    /*All Users Function*/
    
    /*Distroy log out function*/

	session_destroy();
	echo "<script>window.location.replace('../../index.php')</script>";
?>