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


	include_once '../../cus/tap_printer.php';
	include_once '../../cus/bottle_printer.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Anthill Pub Administration Panel</title>
        <link rel="stylesheet" type="text/css" href="css/jquery.validate.css" />
        <link rel="stylesheet" type="text/css" href="css/edit.drinks.style.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/jquery.metadata.js" type="text/javascript"></script>
        <script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
        <script src="js/jquery.validate.js" type="text/javascript"></script>
        <script src="js/jquery.validation.functions.js" type="text/javascript"></script>
        <script src="js/jquery.blockUI.js" type="text/javascript"></script>
        <script src="js/jquery.bpopup.min.js" type="text/javascript"></script>
        <script src="js/edit.drinks.helper.js" type="text/javascript"></script>
        <script src="js/ajax.saver.js" type="text/javascript"></script>

    </head>
    <body>
	    <div class="edit_container">
	   		<div class="edit_header">
				<p>Edit Drinks</p>
			</div>
			<div class="filter_container">
				<div class="filter_links">
					Show:
					<button id="all_link" class="filter">All</a>
					<button id="tap_link" class="filter">Tap</a>
					<button id="bottle_link" class="filter">Bottle</a>
					<button id="wine_link" class="filter">Wine</a>
					<button id="home"><a style="text-decoration:none" href="home.php">Home</a>
					<button id="current_page_link"><a style="text-decoration:none" href="../../index.php#beer">View Current Page</a>
				</div>
			</div>
	    	<table cellspacing="0" id="drinks_table" class="tablesorter"> 
		    	<thead> 
			    	<tr>
			    		<th>#</th> 
				    	<th>Brewer/Vinter</th> 
				    	<th>Name</th> 
				    	<th>Type</th> 
				    	<th>Alcohol %</th> 
				    	<th>Options</th>
				    </tr> 
				</thead> 
				<tbody> 
					<?php 
						//print taps
						$taps = new tap_printer();
						$taps->getTaps();
						$taps->printForAdmin();
						//print bottled beer
						$bottledBeer = new bottle_printer();
                        $bottledBeer->getBottles(2);
                        $bottledBeer->printForAdmin();
                        //print wine
                        $bottledBeer = new bottle_printer();
                        $bottledBeer->getBottles(3);
                        $bottledBeer->printForAdmin();

					?>
					<!--<tr>
						<td class="id">1</td>  
						<td class="brewer">Stone Brewing Co.</td> 
						<td class="name">Stone IPA</td> 
						<td class="type">Bottle</td> 
						<td class="percentage">6.9%</td> 
						<td class="options">
							<img src="media/images/editIcon.png" alt="Edit" class="edit_icon">
							<img src="media/images/deleteIcon.png" alt="Delete" class="delete_icon">
						</td> 
					</tr> 
					<tr>
						<td class="id">2</td>  
					    <td class="brewer">Abita Brewing Co.</td> 
					    <td class="name">Abbey Ale</td> 
					    <td class="type">Tap</td>
					    <td class="percentage">8.0%</td> 
					    <td class="options">
						    <img src="media/images/editIcon.png" alt="Edit" class="edit_icon">
							<img src="media/images/deleteIcon.png" alt="Delete" class="delete_icon">
					    </td>  
					</tr> 
					<tr>
						<td class="id">3</td>  
					    <td class="brewer">Abita Brewing Co.</td> 
					    <td class="name">Purple Haze</td> 
					    <td class="type">Tap</td>
					    <td class="percentage">4.2%</td> 
					    <td class="options">
						    <img src="media/images/editIcon.png" alt="Edit" class="edit_icon">
							<img src="media/images/deleteIcon.png" alt="Delete" class="delete_icon">
					    </td>  
					</tr>
					<tr>
						<td class="id">4</td>  
					    <td class="brewer">Alaskan Brewing Co.</td> 
					    <td class="name">Alaskan Stout</td> 
					    <td class="type">Tap</td>
					    <td class="percentage">5.7%</td> 
					    <td class="options">
						    <img src="media/images/editIcon.png" alt="Edit" class="edit_icon">
							<img src="media/images/deleteIcon.png" alt="Delete" class="delete_icon">
					    </td>  
					</tr>  
					<tr>
						<td class="id">5</td>  
					    <td class="brewer">Great Lakes Brewing Co.</td> 
					    <td class="name">Honey Ale</td> 
					    <td class="type">Tap</td> 
					    <td class="percentage">8.0%</td> 
					    <td class="options">
						    <img src="media/images/editIcon.png" alt="Edit" class="edit_icon">
							<img src="media/images/deleteIcon.png" alt="Delete" class="delete_icon">
					    </td>  
					</tr>
					<tr>
						<td class="id">6</td>  
					    <td class="brewer">Sierra Nevada</td> 
					    <td class="name">Sierra Nevada Pale Ale</td> 
					    <td class="type">Bottle</td> 
					    <td class="percentage">5.7%</td> 
					    <td class="options">
						    <img src="media/images/editIcon.png" alt="Edit" class="edit_icon">
							<img src="media/images/deleteIcon.png" alt="Delete" class="delete_icon">
					    </td>  
					</tr>
					<tr>
						<td class="id">7</td>  
					    <td class="brewer">Virginia Apple Co.</td> 
					    <td class="name">Light Apple Wine</td> 
					    <td class="type">Wine</td> 
					    <td class="percentage">7.2%</td> 
					    <td class="options">
						    <img src="media/images/editIcon.png" alt="Edit" class="edit_icon">
							<img src="media/images/deleteIcon.png" alt="Delete" class="delete_icon">
					    </td>  
					</tr>
					<tr>
						<td class="id">8</td>  
					    <td class="brewer">Beringer Blass Wine Est.</td> 
					    <td class="name">Beringer White Wine</td> 
					    <td class="type">Wine</td> 
					    <td class="percentage">11.2%</td> 
					    <td class="options">
						    <img src="media/images/editIcon.png" alt="Edit" class="edit_icon">
							<img src="media/images/deleteIcon.png" alt="Delete" class="delete_icon">
					    </td>  
					</tr>-->      
				</tbody> 
			</table>	
			<div id="addnew_button" class="addnew button">+ Add New</div>
			<div id="delete_popup">
				<a class="b-close">x</a>
				<img src="media/images/deleteIcon.png" alt="Delete">
				<h1>You are about to delete:</h1>
				<p class="warning"></p>
				This cannot be undone!
				<div class="confirm_delete confirm_button">Confirm</div>
				<div class="cancel_delete cancel_button">Cancel</div>
			</div>
			<div class="form_container">
				<form class="edit_form" action="" method="post">
					<div id="idField"></div>
					<input type="text" name="brewerField" id="brewerField" placeholder="Brewer/Vinter" value=""/>
					<input type="text" name="nameField" id="nameField" placeholder="Name" value=""/>
					<select name="typeField" id="typeField">
	                                <option value="0">Make a Selection</option>
	                                <option value="Tap">Tap</option>
	                                <option value="Bottle">Bottle</option>
	                                <option value="Wine">Wine</option>
	                </select>
					<input type="text" name="percentageField" id="percentageField" placeholder="0.00" value=""/>
					<div class="confirm_edit confirm_button">Save</div>
					<div class="confirm_add confirm_button">Add</div>
					<div class="cancel_edit cancel_button">Cancel</div>
				</form>
			</div>
			
			<!--<div class="form_container_taps">
				<form class="edit_form_for_taps" action="" method="post">
					<div id="idFieldTap"></div>
					<input type="text" name="brewerField" id="brewerField" value=""/>
					<input type="text" name="nameField" id="nameField" value=""/>
					<select name="typeField" id="typeField">
	                                <option value="Tap">Tap</option>
	                </select>
					<input type="text" name="percentageField" id="percentageField" value=""/>
					<div class="confirm_edit confirm_button">Save</div>
					<div class="cancel_edit cancel_button">Cancel</div>
				</form>
			<!--</div>-->


	    </div>

    </body>
</html>
