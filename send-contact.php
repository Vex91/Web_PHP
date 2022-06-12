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
		
	
		
        <meta name="author" content="vedran.pozajic@gmail.com">
		<!-- favicon meta -->
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
		<!-- end favicon meta -->
		<!-- end meta elements -->
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
		<!-- End Google Fonts -->
		<title>BUKSA - Naslovnica</title>
	</head>
	<body>
		<header>
			<div'; if ($menu > 1) { print ' class="hero-subimage"'; } else { print ' class="hero-image"'; }  print '></div>
			<nav>';
				
				include("menu.php");
			print '</nav>
		</header>
		<main>
			<h1>KONTAKTIRAJTE NAS</h1>
			<div id="contact">';
				print '<p style="text-align:center; padding: 10px; background-color: #d7d6d6;border-radius: 5px;">We recieved your question. We will answer within 24 hours.</p>';
					$EmailHeaders  = "MIME-Version: 1.0\r\n";
					$EmailHeaders .= "Content-type: text/html; charset=utf-8\r\n";
					$EmailHeaders .= "From: <vedran.pozaic@gmail.hr>\r\n";
					$EmailHeaders .= "Reply-To:<vedran.pozaic@gmail.hr>\r\n";
					$EmailHeaders .= "X-Mailer: PHP/".phpversion();
					$EmailSubject = 'Example page - Contact Form';
					$EmailBody  = '
					<html>
					<head>
					<title>'.$EmailSubject.'</title>
					<style>
						body {
						background-color: #ffffff;
							font-family: Arial, Helvetica, sans-serif;
							font-size: 16px;
							padding: 0px;
							margin: 0px auto;
							width: 500px;
							color: #000000;
						}
						p {
							font-size: 14px;
						}
						a {
							color: #00bad6;
							text-decoration: underline;
							font-size: 14px;
						}
						
					</style>
					</head>
					<body>
						<p>Ime: ' . $_POST['firstname'] . '</p>
						<p>Prezime: ' . $_POST['lastname'] . '</p>
						<p>E-mail: <a href="mailto:' . $_POST['email'] . '">' . $_POST['email'] . '</a></p>
						<p>Poruka: ' . $_POST['description'] . '</p>
					</body>
					</html>';
				print '<p>Ime: ' . $_POST['firstname'] . '</p>
					<p>Prezime: ' . $_POST['lastname'] . '</p>
					<p>E-mail: ' . $_POST['email'] . '</p>
					<p>Poruka: ' . $_POST['description'] . '</p>';
				mail($_POST['email'], $EmailSubject, $EmailBody, $EmailHeaders);
	echo '
			</div>
		</main>
		<footer>
		<p>Copyright &copy; ' . date("Y") . ' Vedran Pozaić</p>
		</footer>
	</body>
</html>
';