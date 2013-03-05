<?php
	
	include 'tap_printer.php';

	 $tap_printer = new tap_printer();
     $tap_printer->getTaps();
     $tap_printer->printTapsForFront();


     echo 13 % 2;

     //echo (int)(11 / 2);
?>