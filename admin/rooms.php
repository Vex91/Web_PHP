<?php 
	
	#Add rooms
	if (isset($_POST['_action_']) && $_POST['_action_'] == 'add_room') {
		$_SESSION['message'] = '';
		# htmlspecialchars — Convert special characters to HTML entities
		# http://php.net/manual/en/function.htmlspecialchars.php
		$query  = "INSERT INTO room (name, description, person_count, price)";
		$query .= " VALUES ('" . htmlspecialchars($_POST['name'], ENT_QUOTES) .
		 "', '" . htmlspecialchars($_POST['description'], ENT_QUOTES) . 
		 "', '" . $_POST['person_count'] .
		 "', '" . $_POST['price'] .
		 "')";
		$result = @mysqli_query($MySQL, $query);
		
		$ID = mysqli_insert_id($MySQL);
		
		# picture
        if($_FILES['picture']['error'] == UPLOAD_ERR_OK && $_FILES['picture']['name'] != "") {
                
			# strtolower - Returns string with all alphabetic characters converted to lowercase. 
			# strrchr - Find the last occurrence of a character in a string
			$ext = strtolower(strrchr($_FILES['picture']['name'], "."));
			
            $_picture = $ID . '-' . rand(1,100) . $ext;
			copy($_FILES['picture']['tmp_name'], "rooms_img/".$_picture);
			
			if ($ext == '.jpg' || $ext == '.png' || $ext == '.gif') { # test if format is picture
				$_query  = "UPDATE room SET picture='" . $_picture . "'";
				$_query .= " WHERE id=" . $ID . " LIMIT 1";
				$_result = @mysqli_query($MySQL, $_query);
				$_SESSION['message'] .= '<p>You successfully added picture.</p>';
			}
        }
		
		
		$_SESSION['message'] .= '<p>You successfully added room!</p>';
		
		# Redirect
		header("Location: index.php?menu=7&action=2");
	}
	
	# Update room
	if (isset($_POST['_action_']) && $_POST['_action_'] == 'edit_room') {
		$query  = "UPDATE room SET name='" . htmlspecialchars($_POST['name'], ENT_QUOTES) . "',
		 description='" . htmlspecialchars($_POST['description'], ENT_QUOTES) . "',
		 person_count='" . $_POST['person_count'] . "', price='" . $_POST['price'] . "'";
        $query .= " WHERE id=" . (int)$_POST['edit'];
        $query .= " LIMIT 1";
        $result = @mysqli_query($MySQL, $query);
		
		# picture
        if($_FILES['picture']['error'] == UPLOAD_ERR_OK && $_FILES['picture']['name'] != "") {
                
			# strtolower - Returns string with all alphabetic characters converted to lowercase. 
			# strrchr - Find the last occurrence of a character in a string
			$ext = strtolower(strrchr($_FILES['picture']['name'], "."));
            
			$_picture = (int)$_POST['edit'] . '-' . rand(1,100) . $ext;
			copy($_FILES['picture']['tmp_name'], "rooms_img/".$_picture);
			
			
			if ($ext == '.jpg' || $ext == '.png' || $ext == '.gif') { # test if format is picture
				$_query  = "UPDATE room SET picture='" . $_picture . "'";
				$_query .= " WHERE id=" . (int)$_POST['edit'] . " LIMIT 1";
				$_result = @mysqli_query($MySQL, $_query);
				$_SESSION['message'] .= '<p>You successfully added picture.</p>';
			}
        }
		
		$_SESSION['message'] = '<p>You successfully changed room!</p>';
		
		# Redirect
		header("Location: index.php?menu=7&action=2");
	}
	# End update room
	
	# Delete room
	if (isset($_GET['delete']) && $_GET['delete'] != '') {
		
		# Delete picture
        $query  = "SELECT picture FROM room";
        $query .= " WHERE id=".(int)$_GET['delete']." LIMIT 1";
        $result = @mysqli_query($MySQL, $query);
        $row = @mysqli_fetch_array($result);
        @unlink("rooms_img/".$row['picture']); 
		
		# Delete room
		$query  = "DELETE FROM room";
		$query .= " WHERE id=".(int)$_GET['delete'];
		$query .= " LIMIT 1";
		$result = @mysqli_query($MySQL, $query);

		$_SESSION['message'] = '<p>You successfully deleted room!</p>';
		
		# Redirect
		header("Location: index.php?menu=7&action=2");
	}
	# End delete room
	
	
	#Show room info
	if (isset($_GET['id']) && $_GET['id'] != '') {
		$query  = "SELECT * FROM room";
		$query .= " WHERE id=".$_GET['id'];
		$query .= " ORDER BY create_date DESC";
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result);
		print '
		<h2>rooms overview</h2>
		<div class="room">
			<img src="rooms_img/' . $row['picture'] . '" alt="' . $row['name'] . '" name="' . $row['name'] . '">
			<h2>' . $row['name'] . '</h2>
			' . $row['description'] . '
			<time datetime="' . $row['create_date'] . '">' . pickerDateToMysql($row['create_date']) . '</time><br/>
			<span>Cijena: ' . $row['price'] . '</span>
			<hr>
		</div>
		<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>';
	}
	
	#Add room 
	else if (isset($_GET['add']) && $_GET['add'] != '') {
		
		print '
		<h2>Add room</h2>
		<form action="" id="room_form" name="room_form" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="_action_" name="_action_" value="add_room">
			
			<label for="name">Ime *</label>
			<input type="text" id="name" name="name" placeholder="Ime sobe.." required>

			<label for="description">Opis *</label>
			<textarea id="description" name="description" placeholder="Opis sobe.." required></textarea>
				
			<label for="picture">Slika</label>
			<input type="file" id="picture" name="picture">
						
			<label for="person_count">Broj osoba:</label><br />
            <input type="number" name="person_count" value="1">			
			<hr>
			
			<input type="submit" value="Submit">
		</form>
		<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>';
	}
	#Edit rooms
	else if (isset($_GET['edit']) && $_GET['edit'] != '') {
		$query  = "SELECT * FROM room";
		$query .= " WHERE id=".$_GET['edit'];
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result);
		$checked_archive = false;

		print '
		<h2>Edit room</h2>
		<form action="" id="room_form_edit" name="room_form_edit" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="_action_" name="_action_" value="edit_room">
			<input type="hidden" id="edit" name="edit" value="' . $row['id'] . '">
			
			<label for="name">Naziv *</label>
			<input type="text" id="name" name="name" value="' . $row['name'] . '" placeholder="Naziv sobe.." required>

			<label for="description">Opis *</label>
			<textarea id="description" name="description" placeholder="Opis sobe.." required>' . $row['description'] . '</textarea>
				
			<label for="person_count">Broj osoba</label>
			<input type="number" id="person_count" name="person_count" value="' . $row['person_count'] . '">

			<label for="picture">Picture</label>
			<input type="file" id="picture" name="picture">

			<label for="price">Cijena *</label>
			<input id="price" name="price" type="number" min="1" step="any" value="' . $row['price'] . '" required/>

			<hr>
			
			<input type="submit" value="Submit">
		</form>
		<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>';
	}
	else {
		print '
		<h2>Sobe</h2>
		<div id="room">
			<table>
				<thead>
					<tr>
						<th width="16"></th>
						<th width="16"></th>
						<th width="16"></th>
						<th>Naziv</th>
						<th>Opis</th>
						<th>Datum</th>
						<th width="16"></th>
					</tr>
				</thead>
				<tbody>';
				$query  = "SELECT * FROM room";
				$query .= " ORDER BY create_date DESC";
				$result = @mysqli_query($MySQL, $query);
				while($row = @mysqli_fetch_array($result)) {
					print '
					<tr>
						<td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;id=' .$row['id']. '"><img src="img/user.png" alt="user"></a></td>
						<td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;edit=' .$row['id']. '"><img src="img/edit.png" alt="uredi"></a></td>
						<td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;delete=' .$row['id']. '"><img src="img/delete.png" alt="obriši"></a></td>
						<td>' . $row['name'] . '</td>
						<td>';
						if(strlen($row['description']) > 160) {
                            echo substr(strip_tags($row['description']), 0, 160).'...';
                        } else {
                            echo strip_tags($row['description']);
                        }
						print '
						</td>
						<td>' . pickerDateToMysql($row['create_date']) . '</td>
						<td></td>
					</tr>';
				}
			print '
				</tbody>
			</table>
			<a href="index.php?menu=' . $menu . '&amp;action=' . $action . '&amp;add=true" class="AddLink">Add room</a>
		</div>';
	}
	
	# Close MySQL connection
	@mysqli_close($MySQL);
?>