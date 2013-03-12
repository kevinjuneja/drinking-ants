<?php
    session_start();
    
    include_once '../../cus/variables.php';

    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE) {


       // echo "success";
    }
    else {
       // echo "Session is not set";
        header(sprintf("Location: %s", $index));
        exit;
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Anthill Pub Administration Panel</title>
        <link rel="stylesheet" type="text/css" href="css/jquery.validate.css" />
        <link rel="stylesheet" type="text/css" href="css/main.style.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/jquery.validate.js" type="text/javascript"></script>
        <script src="js/jquery.validation.functions.js" type="text/javascript"></script>
        <script src="js/helper.js" type="text/javascript"></script>
    </head>
    <body>
    	<div class="menu_container">
    		<div class="header">
    			<p>Anthill Pub & Grille Admin Panel</p>
    		</div>
    		<br/>
    		<div class="non_type">
    			Click a button below to view and edit its content.
    			<br/>
    			<a href="#" class="drinks button">Drinks</a>
    			<a href="#" class="drinks_page button">View Website</a>
    			<a href="#" class="events button">Events</a>
    			<a href="#" class="events_page button">View Website</a>
    			<a href="#" class="menu button">Menu</a>
    			<a href="#" class="menu_page button">View Website</a>
    			<a href="#" class="about_us button">About Us (Press)</a>
    			<a href="#" class="about_us_page button">View Website</a>
    			<a href="#" class="contact button">Contact Information</a>
    			<a href="#" class="contact_page button">View Website</a>
    		</div>
    		<div class="type">
    			Click a button below to edit an item's type.
    			<br/>
    			<a href="#" class="drink_type button">Edit Drink Types</a>
    			<a href="#" class="food_type button">Edit Food Types</a>
    		</div>
    	</div>
    </body>
</html>
