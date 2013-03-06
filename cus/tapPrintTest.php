<?php
	
	include 'bottle_printer.php';

	 $tap_printer = new bottle_printer();
     $tap_printer->countRows(2);
     $tap_printer->getBottles(2);
     $tap_printer->printBottlesForFront();


     //echo 13 % 2;

     //echo (int)(11 / 2);
?>