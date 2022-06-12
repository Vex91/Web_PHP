<?php 
	# Stop Hacking attempt
	define('__APP__', TRUE);
	
	# Start session
    session_start();
	
	# Database connection
	include ("dbconn.php");
	
	# Variables MUST BE INTEGERS
    if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; }
	if(isset($_GET['action'])) { $action   = (int)$_GET['action']; }
	
	# Variables MUST BE STRINGS A-Z
    if(!isset($_POST['_action_']))  { $_POST['_action_'] = FALSE;  }
	
	if (!isset($menu)) { $menu = 1; }
	
	# Classes & Functions
    include_once("functions.php");
	
print '
<!DOCTYPE html>
<html>
	<head>
		
		<!-- CSS -->
		<link rel="stylesheet" href="style.css">
		<!-- End CSS -->
		<!-- meta elements -->
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="description" content=" Hostel najam soba. ">
		<meta name="keywords" content="soba, hostel, hotel, zagreb, najam, smještaj">
		<meta name="author" content="Vedran Pozaić">
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
		
	
		
        <meta name="author" content="vedran.pozaic@gmail.com">
		<!-- favicon meta -->
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
		<!-- end favicon meta -->
		<!-- end meta elements -->
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
		<!-- End Google Fonts -->
		<title>Buksa - Naslovnica</title>
		<script src="lib\jquery-3.5.1.min.js"></script>
	</head>
<body>
	<header>
		<div'; if ($menu > 1) { print ' class="hero-subimage"'; } else { print ' class="hero-image"'; }  print '></div>
		<nav>';
			
			include("menu.php");
		print '</nav>
	</header>
	<main>';
		if (isset($_SESSION['message'])) {
			print $_SESSION['message'];
			unset($_SESSION['message']);
		}
	
	# Homepage
	if (!isset($menu) || $menu == 1) { include("home.php"); }
	
	# Galery
	else if ($menu == 2) { include("galery.php"); }
	
	# Contact
	else if ($menu == 3) { include("contact.php"); }
	
	# About us
	else if ($menu == 4) { include("about-us.php"); }
	
	# Register
	else if ($menu == 5) { include("register.php"); }
	
	# Signin
	else if ($menu == 6) { include("signin.php"); }
	
	# Admin webpage
	else if ($menu == 7) { include("admin.php"); }

	# Reservation
	else if ($menu == 8) { include("reservation.php"); }

	# Rooms
	else if ($menu == 9) { include("rooms.php"); }

	# Currency List
	else if ($menu == 10) { include("curency_list.php"); }
	
	print '
	</main>
	<footer>
		<p>Copyright &copy; ' . date("Y") . ' Vedran Pozaić</p>
	</footer>
</body>
</html>';
?>
