<?php
	
session_start();
	include_once '../../cus/variables.php';

	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE) {

		header(sprintf("Location: %s", $adminRedirection));
        exit;
       // echo "success";
    }
    else {
       // echo "Session is not set";
        header(sprintf("Location: %s", $indexRedirection));
        exit;
    }
?>