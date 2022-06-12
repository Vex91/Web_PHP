<?php 
	
	#Add reservation
	if (isset($_POST['_action_']) && $_POST['_action_'] == 'add_reservation') {
		$_SESSION['message'] = '';
		# htmlspecialchars — Convert special characters to HTML entities
		# http://php.net/manual/en/function.htmlspecialchars.php
		$query  = "INSERT INTO reservation (firstname, lastname, email, date_from, date_to, person_count)";
		$query .= " VALUES ('" . htmlspecialchars($_POST['firstname'], ENT_QUOTES) .
		 "', '" . htmlspecialchars($_POST['lastname'], ENT_QUOTES) .
		 "', '" . htmlspecialchars($_POST['email'], ENT_QUOTES) .
		 "', '" . htmlspecialchars($_POST['date_from'], ENT_QUOTES) .
		 "', '" . htmlspecialchars($_POST['date_to'], ENT_QUOTES) .
		 "', '" . $_POST['person_count'] .
		 "')";
		$result = @mysqli_query($MySQL, $query);

		$ID = mysqli_insert_id($MySQL);

		$_SESSION['message'] .= '<p>You successfully added reservation!</p>';
		
		# Redirect
		header("Location: index.php?menu=7&action=3");
	}
	
	# Update reservation
	if (isset($_POST['_action_']) && $_POST['_action_'] == 'edit_reservation') {
		$query  = "UPDATE reservation SET firstname='" .
		 htmlspecialchars($_POST['firstname'], ENT_QUOTES) . 
		 "', lastname='" . htmlspecialchars($_POST['lastname'], ENT_QUOTES) .
		 "', email='" . htmlspecialchars($_POST['email'], ENT_QUOTES) .
		 "', date_from='" . htmlspecialchars($_POST['date_from'], ENT_QUOTES) .
		 "', date_to='" . htmlspecialchars($_POST['date_to'], ENT_QUOTES) .
		 "', person_count='" . $_POST['person_count'] . "'";
        $query .= " WHERE id=" . (int)$_POST['edit'];
        $query .= " LIMIT 1";
        $result = @mysqli_query($MySQL, $query);
		
		$_SESSION['message'] = '<p>You successfully changed reservation!</p>';
		
		# Redirect
		header("Location: index.php?menu=7&action=3");
	}
	# End update reservation
	
	# Delete reservation
	if (isset($_GET['delete']) && $_GET['delete'] != '') {

		# Delete reservation
		$query  = "DELETE FROM reservation";
		$query .= " WHERE id=".(int)$_GET['delete'];
		$query .= " LIMIT 1";
		$result = @mysqli_query($MySQL, $query);

		$_SESSION['message'] = '<p>You successfully deleted reservation!</p>';
		
		# Redirect
		header("Location: index.php?menu=7&action=3");
	}
	# End delete reservation
	
	
	#Show reservation info
	if (isset($_GET['id']) && $_GET['id'] != '') {
		$query  = "SELECT * FROM reservation";
		$query .= " WHERE id=".$_GET['id'];
		$query .= " ORDER BY create_date DESC";
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result);
		print '
		<h2>Reservation overview</h2>
		<div class="reservation">
			<h2>' . $row['firstname'] . ' ' . $row['lastname'] . '</h2>'.
			'OD: <time datetime="' . $row['date_from'] . '">' . pickerDateToMysql($row['date_from']) . '</time>
			DO: <time datetime="' . $row['date_to'] . '">' . pickerDateToMysql($row['date_to']) . '</time><br/>
			<span>Broj osoba: ' . $row['person_count'] . '</span><br/>
			Kreirano: <time datetime="' . $row['create_date'] . '">' . pickerDateToMysql($row['create_date']) . '</time>
			<hr>
		</div>
		<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>';
	}
	
	#Add reservation 
	else if (isset($_GET['add']) && $_GET['add'] != '') {
		
		print '
		<h2>Add reservation</h2>
		<form action="" id="reservation_form" name="reservation_form" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="_action_" name="_action_" value="add_reservation">
			
			<label for="firstname">Ime *</label>
			<input type="text" id="firstname" name="firstname" placeholder="Ime" required>

			<label for="lastname">Prezime *</label>
			<input type="text" id="lastname" name="lastname" placeholder="Prezime" required>

			<label for="email">Email *</label>
			<input type="text" id="email" name="email" value="" placeholder="info@example.com" required>

			<label for="date_from">OD *</label>
			<input type="datetime-local" id="date_from"
				name="date_from" value=""
				min="2020-06-07T00:00">
			<label for="date_to">DO *</label>
			<input type="datetime-local" id="date_to"
				name="date_to" value=""
				min="2020-06-07T00:00">
			<label for="person_count">Broj osoba:</label><br />
            <input type="number" name="person_count" value="1">			
			<hr>
			
			<input type="submit" value="Submit">
		</form>
		<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>';
	}
	#Edit reservation
	else if (isset($_GET['edit']) && $_GET['edit'] != '') {
		$query  = "SELECT *, DATE_FORMAT(date_from, '%Y-%m-%dT%H:%i') AS date_from, DATE_FORMAT(date_to, '%Y-%m-%dT%H:%i') AS date_to FROM reservation";
		$query .= " WHERE id=".$_GET['edit'];
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result);
		$checked_archive = false;

		print '
		<h2>Edit reservation</h2>
		<form action="" id="reservation_form_edit" name="reservation_form_edit" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="_action_" name="_action_" value="edit_reservation">
			<input type="hidden" id="edit" name="edit" value="' . $row['id'] . '">
			
			<label for="firstname">Ime *</label>
			<input type="text" id="firstname" name="firstname" value="' . $row['firstname'] . '" placeholder="Ime *" required>
			<label for="lastname">Prezime *</label>
			<input type="text" id="lastname" name="lastname" value="' . $row['lastname'] . '" placeholder="Prezime *" required>
			<label for="email">Email *</label>
			<input type="text" id="email" name="email" value="' . $row['email'] . '" placeholder="info@example.com *" required>

			<label for="date_from">OD *</label>
			<input type="datetime-local" id="date_from"
				name="date_from" value="' . $row['date_from'] . '"
				min="2020-06-07T00:00">
			<label for="date_to">DO *</label>
			<input type="datetime-local" id="date_to"
				name="date_to" value="' . $row['date_to'] . '"
				min="2020-06-07T00:00">
				
			<label for="person_count">Broj osoba</label>
			<input type="number" id="person_count" name="person_count" value="' . $row['person_count'] . '">
			<hr>
			
			<input type="submit" value="Submit">
		</form>
		<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>';
	}
	else {
		print '
		<h2>Rezervacija</h2>
		<div id="reservation">
			<table>
				<thead>
					<tr>
						<th width="16"></th>
						<th width="16"></th>
						<th width="16"></th>
						<th>Naziv</th>
						<th>Datum od</th>
						<th>Datum do</th>
						<th>Datum</th>
						<th width="16"></th>
					</tr>
				</thead>
				<tbody>';
				$query  = "SELECT * FROM reservation";
				$query .= " ORDER BY create_date DESC";
				$result = @mysqli_query($MySQL, $query);
				while($row = @mysqli_fetch_array($result)) {
					print '
					<tr>
						<td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;id=' .$row['id']. '"><img src="img/user.png" alt="user"></a></td>
						<td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;edit=' .$row['id']. '"><img src="img/edit.png" alt="uredi"></a></td>
						<td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;delete=' .$row['id']. '"><img src="img/delete.png" alt="obriši"></a></td>
						<td>' . $row['firstname'] . ' ' . $row['lastname'] . '</td>
						<td>' . pickerDateToMysql($row['date_from']) . '</td>
						<td>' . pickerDateToMysql($row['date_to']) . '</td>
						<td>' . pickerDateToMysql($row['create_date']) . '</td>
						<td></td>
					</tr>';
				}
			print '
				</tbody>
			</table>
			<a href="index.php?menu=' . $menu . '&amp;action=' . $action . '&amp;add=true" class="AddLink">Add reservation</a>
		</div>';
	}
	
	# Close MySQL connection
	@mysqli_close($MySQL);
?>