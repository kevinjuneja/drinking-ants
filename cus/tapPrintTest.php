<?php
	
	include 'tap_printer.php';

	 $tap_printer = new tap_printer();
     $tap_printer->getTaps();
     $tap_printer->printTaps();


     echo "test";
?>