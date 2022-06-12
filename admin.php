<?php 
	if ($_SESSION['user']['valid'] == 'true') {
		if (!isset($action)) { $action = 1; }
		print '
		<h1>Administration</h1>
		<div id="admin">
			<ul>
				<li><a href="index.php?menu=7&amp;action=1">Users</a></li>
				<li><a href="index.php?menu=7&amp;action=2">Sobe</a></li>
				<li><a href="index.php?menu=7&amp;action=3">Rezervacije</a></li>
				<li><a href="index.php?menu=7&amp;action=4">Rezervacije soba</a></li>
			</ul>';
			# Admin Users
			if ($action == 1) { include("admin/users.php"); }
			
			# Admin rooms
			else if ($action == 2) { include("admin/rooms.php"); }

			# Admin reservations
			else if ($action == 3) { include("admin/reservation.php"); }

			# Admin room_reservations
			else if ($action == 4) { include("admin/room_reservation.php"); }
		print '
		</div>';
	}
	else {
		$_SESSION['message'] = '<p>Please register or login using your credentials!</p>';
		header("Location: index.php?menu=6");
	}
?>