<?php 
	
	#Add room_reservation
	if (isset($_POST['_action_']) && $_POST['_action_'] == 'add_room_reservation') {
		$_SESSION['message'] = '';
		# htmlspecialchars — Convert special characters to HTML entities
		# http://php.net/manual/en/function.htmlspecialchars.php
		$query  = "INSERT INTO room_reservation (room_id, reservation_id, price)";
        $query .= " VALUES ('" . $_POST['room_id'] . "', '" . $_POST['reservation_id'] . "', '" . $_POST['price'] . "')";
        $result = @mysqli_query($MySQL, $query);

		$ID = mysqli_insert_id($MySQL);

		$_SESSION['message'] .= '<p>You successfully added room reservation!</p>';
		
		# Redirect
		header("Location: index.php?menu=7&action=4");
	}
	
	# Update room_reservation
	if (isset($_POST['_action_']) && $_POST['_action_'] == 'edit_room_reservation') {
		$query  = "UPDATE room_reservation SET room_id=" .
		 $_POST['room_id'] . 
		 ", reservation_id=" . $_POST['reservation_id'] . 
		 ", price=" .$_POST['price'];
        $query .= " WHERE id=" . (int)$_POST['edit'];
        $query .= " LIMIT 1";
        $result = @mysqli_query($MySQL, $query);
		
		$_SESSION['message'] = '<p>You successfully changed room reservation!</p>';
		
		# Redirect
		header("Location: index.php?menu=7&action=4");
	}
	# End update room_reservation
	
	# Delete room_reservation
	if (isset($_GET['delete']) && $_GET['delete'] != '') {

		# Delete room_reservation
		$query  = "DELETE FROM room_reservation";
		$query .= " WHERE id=".(int)$_GET['delete'];
		$query .= " LIMIT 1";
		$result = @mysqli_query($MySQL, $query);

		$_SESSION['message'] = '<p>You successfully deleted room reservation!</p>';
		
		# Redirect
		header("Location: index.php?menu=7&action=4");
	}
	# End delete room_reservation
	
	
	#Show room_reservation info
	if (isset($_GET['id']) && $_GET['id'] != '') {
		$query  = "SELECT *,rr.id as rr_id, rr.price as rr_price, r.name as room_name,  res.date_from as res_from, res.date_to as res_to FROM room_reservation rr LEFT JOIN room r on rr.room_id = r.id LEFT JOIN reservation res on rr.reservation_id = res.id";
		$query .= " WHERE rr.id=".$_GET['id'];
		$query .= " ORDER BY rr.create_date DESC";
		$result = @mysqli_query($MySQL, $query);
        $row = @mysqli_fetch_array($result);
		print '
		<h2>Room reservation overview</h2>
		<div class="room_reservation">
            Soba: <span>' . $row['room_name'] . '</span><br/>
            Rezervacija: <span><a href="index.php?menu=7&amp;action=3&amp;id=' .  $row['reservation_id'] . '">' . $row['res_from'] . ' - ' . $row['res_from'] . '</a></span>
            Cijena: <span>' . $row['rr_price'] . '</span>
			Kreirano: <time datetime="' . $row['create_date'] . '">' . pickerDateToMysql($row['create_date']) . '</time>
			<hr>
		</div>
		<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>';
	}
	
	#Add room_reservation 
	else if (isset($_GET['add']) && $_GET['add'] != '') {
		
		print '
		<h2>Add room_reservation</h2>
		<form action="" id="room_reservation_form" name="room_reservation_form" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="_action_" name="_action_" value="add_room_reservation">
			
            <label for="room_id">Soba:</label>
			<select name="room_id" id="room_id">
				<option value="">molimo odaberite</option>';
				#Select all rooms from database webprog
				$query  = "SELECT * FROM room";
				$result = @mysqli_query($MySQL, $query);
				while($row = @mysqli_fetch_array($result)) {
					print '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
				}
			print '
            </select>
            <select name="reservation_id" id="reservation_id">
				<option value="">molimo odaberite</option>';
				#Select all rooms from database webprog
				$query  = "SELECT * FROM reservation";
				$result = @mysqli_query($MySQL, $query);
				while($row = @mysqli_fetch_array($result)) {
					print '<option value="' . $row['id'] . '">' . $row['date_from'] . ' - ' . $row['date_to'] .'</option>';
				}
			print '
			</select>
            

			<label for="price">Cijena *</label>
			<input id="price" name="price" type="number" min="1" step="any" value=1 required/>
			
			<input type="submit" value="Submit">
		</form>
		<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>';
	}
	#Edit room_reservation
	else if (isset($_GET['edit']) && $_GET['edit'] != '') {
		$query  = "SELECT * FROM room_reservation";
		$query .= " WHERE id=".$_GET['edit'];
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result);
		$checked_archive = false;

		print '
		<h2>Edit room_reservation</h2>
		<form action="" id="room_reservation_form_edit" name="room_reservation_form_edit" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="_action_" name="_action_" value="edit_room_reservation">
            <input type="hidden" id="edit" name="edit" value="' . $row['id'] . '">
            

            <label for="room_id">Soba:</label>
			<select name="room_id" id="room_id">
				<option value="">molimo odaberite</option>';
				#Select all rooms from database webprog
				$query  = "SELECT * FROM room";
				$result = @mysqli_query($MySQL, $query);
				while($row2 = @mysqli_fetch_array($result)) {
                    if($row['room_id'] == $row2['id']){
                        print '<option selected="selected" value="' . $row2['id'] . '">' . $row2['name'] . '</option>';
                    }
                    else{
					    print '<option value="' . $row2['id'] . '">' . $row2['name'] . '</option>';
                    }
				}
			print '
            </select>
            <select name="reservation_id" id="reservation_id">
				<option value="">molimo odaberite</option>';
				#Select all rooms from database webprog
				$query  = "SELECT * FROM reservation";
				$result = @mysqli_query($MySQL, $query);
				while($row2 = @mysqli_fetch_array($result)) {
					if($row['reservation_id'] == $row2['id']){
                        print '<option selected="selected" value="' . $row2['id'] . '">' . $row2['date_from'] . ' - ' . $row2['date_to'] . '</option>';
                    }
                    else{
					    print '<option value="' . $row2['id'] . '">' . $row2['date_from'] . ' - ' . $row2['date_to'] . '</option>';
                    }
				}
			print '
            </select>
            
			<label for="price">Cijena *</label>
            <input id="price" type="number" name="price" step="any" value="' . $row['price'] . '"/>
			<hr/>
			<input type="submit" value="Submit">
		</form>
		<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>';
	}
	else {
		print '
		<h2>Rezervacija sobe</h2>
		<div id="room_reservation">
			<table>
				<thead>
					<tr>
						<th width="16"></th>
						<th width="16"></th>
						<th width="16"></th>
						<th>Soba</th>
						<th>Rezervacija</th>
						<th>Cijena</th>
						<th>Datum</th>
						<th width="16"></th>
					</tr>
				</thead>
				<tbody>';
				$query  = "SELECT *,rr.id as rr_id, rr.price as rr_price, r.name as room_name,  res.date_from as res_from, res.date_to as res_to FROM room_reservation rr LEFT JOIN room r on rr.room_id = r.id LEFT JOIN reservation res on rr.reservation_id = res.id";
				$query .= " ORDER BY rr.create_date DESC";
				$result = @mysqli_query($MySQL, $query);
				while($row = @mysqli_fetch_array($result)) {
					print '
					<tr>
						<td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;id=' .$row['rr_id']. '"><img src="img/user.png" alt="user"></a></td>
						<td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;edit=' .$row['rr_id']. '"><img src="img/edit.png" alt="uredi"></a></td>
						<td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;delete=' .$row['rr_id']. '"><img src="img/delete.png" alt="obriši"></a></td>
						<td>' . $row['room_name'] . '</td>
						<td>' . $row['res_from'] . ' - ' . $row['res_to'] . '</td>
						<td>' . $row['rr_price'] . '</td>
						<td>' . pickerDateToMysql($row['create_date']) . '</td>
						<td></td>
					</tr>';
				}
			print '
				</tbody>
			</table>
			<a href="index.php?menu=' . $menu . '&amp;action=' . $action . '&amp;add=true" class="AddLink">Add room_reservation</a>
		</div>';
	}
	
	# Close MySQL connection
	@mysqli_close($MySQL);
?>