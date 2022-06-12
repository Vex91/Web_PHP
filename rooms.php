<?php
	
	if (isset($action) && $action != '') {
		$query  = "SELECT * FROM room";
		$query .= " WHERE id=" . $_GET['action'];
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result);
			print '
			<div class="soba">
				<img src="rooms_img/' . $row['picture'] . '" alt="' . $row['name'] . '" title="' . $row['name'] . '">
				<h2>' . $row['name'] . '</h2>
				<p>'  . $row['description'] . '</p>
				<time datetime="' . $row['create_date'] . '">' . pickerDateToMysql($row['create_date']) . '</time>
				<hr>
			</div>';
	}
	else {
		print '<h1>Sobe</h1>';
		$query  = "SELECT * FROM room";
		#$query .= " WHERE archive='N'";
		$query .= " ORDER BY create_date DESC";
		$result = @mysqli_query($MySQL, $query);
		while($row = @mysqli_fetch_array($result)) {
			print '
            <div class="soba">
            <h2>' . $row['name'] . '</h2>
				<img src="rooms_img/' . $row['picture'] . '" alt="' . $row['name'] . '" title="' . $row['name'] . '">'
				;
				if(strlen($row['description']) > 300) {
					echo substr(strip_tags($row['description']), 0, 300).'... <a href="index.php?menu=' . $menu . '&amp;action=' . $row['id'] . '">More</a>';
				} else {
					echo strip_tags($row['description']);
				}
				print '
                <time datetime="' . $row['create_date'] . '">' . pickerDateToMysql($row['create_date']) . '</time><br/>
                <span>Cijena:' . $row['price'] . '</span> Kn
                
				<hr>
			</div>';
		}
	}
?>

