<?php 
	print '
	<ul>
		<li class="home_logo" style="float:left"><a href="index.php?menu=1"><img src="img/logo.png"></a></li>
	';
	if (!isset($_SESSION['user']['valid']) || $_SESSION['user']['valid'] == 'false') {
		print '
		<li><a href="index.php?menu=5">Register</a></li>
		<li><a href="index.php?menu=6">Sign In</a></li>';
	}
	else if ($_SESSION['user']['valid'] == 'true') {
		print '
		<li><a href="index.php?menu=7">Admin</a></li>
		<li><a href="signout.php">Odjava</a></li>';
	}
	print '
		<li><a href="index.php?menu=1">Naslovnica</a></li>
		<li><a href="index.php?menu=4">O nama</a></li>
		<li><a href="index.php?menu=9">Sobe</a></li>
		<li><a href="index.php?menu=3">Kontakt</a></li>
		<li><a href="index.php?menu=2">Galerija</a></li>
		<li><a href="index.php?menu=8">Rezervacija</a></li>
		<li><a href="index.php?menu=10">Tečajna lista</a></li>';
	
	print '
	</ul>';
?>