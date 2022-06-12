<?php
	# Stop Hacking attempt
	if(!defined('__APP__')) {
		die("Hacking attempt");
	}
	
	# Connect to MySQL database
	$MySQL = mysqli_connect("127.0.0.1","root","","webprog") or die('Error connecting to MySQL server.');