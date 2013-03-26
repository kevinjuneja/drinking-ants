<?php

	include_once '../../cus/eventprinter.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Anthill Pub Administration Panel</title>
        <link rel="stylesheet" type="text/css" href="css/jquery.validate.css" />
        <link rel="stylesheet" type="text/css" href="css/edit.events.style.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/jquery.metadata.js" type="text/javascript"></script>
        <script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
        <script src="js/jquery.validate.js" type="text/javascript"></script>
        <script src="js/jquery.validation.functions.js" type="text/javascript"></script>
        <script src="js/jquery.blockUI.js" type="text/javascript"></script>
        <script src="js/jquery.bpopup.min.js" type="text/javascript"></script>
        <script src="js/edit.events.helper.js" type="text/javascript"></script>
    </head>
    <body>
	    <div class="edit_container">
	   		<div class="edit_header">
				<p>Edit Events</p>
			</div>
			<div class="filter_container">
				<button id="current_page_link">View Current Page</a>
			</div>
	    	<table cellspacing="0" id="events_table" class="tablesorter"> 
		    	<thead> 
			    	<tr>
			    		<th>#</th> 
				    	<th>Title</th> 
				    	<!--<th>Link</th>--> 
				    	<th>Date Begin</th> 
				    	<th>Date End</th>
				    	<th>Time Info</th>
				    	<th>Description</th>
				    	<th>Options</th>
				    </tr> 
				</thead> 
				<tbody> 
					<?php
						$events = new EventPrinter();

						$events->printEventAdmin();

					?>

					<!--<tr>
						<td class="id">1</td>  
						<td class="title">Religion Plays Anthill</td>  
						<td class="link">www.google.com/</td> 
						<td class="date_begin">01/20/2013</td> 
						<td class="date_end">01/20/2013</td>
						<td class="time_info">11:00 PM</td>
						<td class="description">
							<span>View Description</span>
							<p class="description_detail">description1 ruff</p>  
						</td>
						<td class="options">
							<img src="media/images/editIcon.png" alt="Edit" class="edit_icon">
							<img src="media/images/deleteIcon.png" alt="Delete" class="delete_icon">
						</td>				
					</tr>
					<tr>
						<td class="id">2</td>  
						<td class="title">Bad Religion Plays Anthill</td>  
						<td class="link">www.google.com/face</td> 
						<td class="date_begin">01/25/2013</td> 
						<td class="date_end">03/26/2013</td>
						<td class="time_info">11:00 PM</td>
						<td class="description">
							<span>View Description</span>
							<p class="description_detail">description2 ryders</p>  
						</td>   
						<td class="options">
							<img src="media/images/editIcon.png" alt="Edit" class="edit_icon">
							<img src="media/images/deleteIcon.png" alt="Delete" class="delete_icon">
						</td>
					</tr>
					
					<tr>
						<td class="id">3</td>  
						<td class="title">Bad Plays Anthill</td>  
						<td class="link">google.com/</td> 
						<td class="date_begin">02/20/2013</td> 
						<td class="date_end">03/20/2013</td>
						<td class="time_info">11:00 PM</td>
						<td class="description">
							<span>View Description</span>
							<p class="description_detail">description3 go</p>  
						</td>						   
						<td class="options">
							<img src="media/images/editIcon.png" alt="Edit" class="edit_icon">
							<img src="media/images/deleteIcon.png" alt="Delete" class="delete_icon">
						</td>
					</tr>-->
					
				</tbody> 
			</table>	
			<div id="addnew_button" class="addnew button">+ Add New</div>
			<div id="delete_popup">
				<a class="b-close">x<a/>
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
					<input type="text" name="titleField" id="titleField" value=""/>
					<!--<input type="text" name="linkField" id="linkField" value=""/>-->
					<input type="text" name="dateBeginField" id="dateBeginField" value=""/>
					<input type="text" name="dateEndField" id="dateEndField" value=""/>
					<input type="text" name="timeField" id="timeField" value=""/>
					<div class="confirm_edit confirm_button">Save</div>
					<div class="cancel_edit cancel_button">Cancel</div>
					<input type="text" name="descriptionField" id="descriptionField" value=""/>
				</form>
			</div>
			<div id="description_popup">
				<a class="b-close">x<a/>
				<h3>Description</h3>
				<p>description</p>
				<div class="confirm_description confirm_button">Okay</div>
			</div>
	    </div>

    </body>
</html>
