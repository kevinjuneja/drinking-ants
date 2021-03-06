<?php
	include_once '../../cus/menuPrinter.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Anthill Pub Administration Panel</title>
        <link rel="stylesheet" type="text/css" href="css/jquery.validate.css" />
        <link rel="stylesheet" type="text/css" href="css/edit.food.style.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/jquery.metadata.js" type="text/javascript"></script>
        <script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
        <script src="js/jquery.validate.js" type="text/javascript"></script>
        <script src="js/jquery.validation.functions.js" type="text/javascript"></script>
        <script src="js/jquery.blockUI.js" type="text/javascript"></script>
        <script src="js/jquery.bpopup.min.js" type="text/javascript"></script>
        <script src="js/edit.food.helper.js" type="text/javascript"></script>
    </head>
    <body>
	    <div class="edit_container">
	   		<div class="edit_header">
				<p>Edit Food</p>
			</div>
			<div class="filter_container">
				<div class="filter_links">
					Show:
					<button id="all_link" class="filter">All</a>
					<button id="appetizer_link" class="filter">Appetizers</a>
					<button id="saladsoup_link" class="filter">Salads & Soups</a>
					<button id="grill_link" class="filter">From the Grille</a>
					<button id="drink_link" class="filter">Drinks</a>
					<button id="current_page_link">View Current Page</a>
				</div>
			</div>
	    	<table cellspacing="0" id="food_table" class="tablesorter"> 
		    	<thead> 
			    	<tr>
			    		<th>#</th> 
				    	<th>Title</th> 
				    	<th>Type</th> 
				    	<th>Burger Item?</th> 
				    	<th>Price</th>
				    	<th>Description</th>
				    	<th>Options</th>
				    </tr> 
				</thead> 
				<tbody> 

					<?php
						$printer = new MenuPrinter();

						$printer->printForAdmin();
					?>
					<!--<tr>
						<td class="id">1</td>  
						<td class="title">Hummus & Pita</td>   
						<td class="type">Appetizers</td> 
						<td class="burger">false</td>
						<td class="price">$3.00</td>
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
						<td class="title">Pizza</td>   
						<td class="type">From the Grill</td> 
						<td class="burger">false</td>
						<td class="price">$5.00</td>
						<td class="description">
							<span>View Description</span>
							<p class="description_detail">wtf is this</p>  
						</td>
						<td class="options">
							<img src="media/images/editIcon.png" alt="Edit" class="edit_icon">
							<img src="media/images/deleteIcon.png" alt="Delete" class="delete_icon">
						</td>				
					</tr>					
					<tr>
						<td class="id">3</td>  
						<td class="title">Chicken salad</td>   
						<td class="type">Salad & Soups</td> 
						<td class="burger">false</td>
						<td class="price">$8.00</td>
						<td class="description">
							<span>View Description</span>
							<p class="description_detail">oooooohh yummy</p>  
						</td>
						<td class="options">
							<img src="media/images/editIcon.png" alt="Edit" class="edit_icon">
							<img src="media/images/deleteIcon.png" alt="Delete" class="delete_icon">
						</td>				
					</tr>
					<tr>
						<td class="id">4</td>  
						<td class="title">CheeseBurger</td>   
						<td class="type">From the Grill</td> 
						<td class="burger">true</td>
						<td class="price">$10.00</td>
						<td class="description">
							<span>View Description</span>
							<p class="description_detail">cheesy puffffs!!!</p>  
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
					<select name="typeField" id="typeField">
	                                <option value="0">Make a Selection</option>
	                                <option value="Appetizers">Appetizers</option>
	                                <option value="Salad & Soups">Salad & Soups</option>
	                                <option value="From the Grill">From the Grill</option>
	                                <option value="Drinks">Drinks</option>
	                </select>
					<input type="checkbox" name="burgerField" id="burgerField"/>
					<span class="checkbox_description">Is it a Burger?</span>
					<input type="text" name="priceField" id="priceField" value=""/>
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
