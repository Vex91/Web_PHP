<?php 
    #Get rooms
    if (isset($_POST['_action_']) && $_POST['_action_'] == 'get_rooms') {
        $_SESSION['message'] = '';
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];

        
        # Database connection
        # When calling from ajax we need to reopen an connection
        $MySQL = mysqli_connect("127.0.0.1","root","","webprog") or die('Error connecting to MySQL server.');
        
        $query  = 'SELECT DISTINCT r.id as r_id, r.name name FROM room r 
                    LEFT JOIN room_reservation rr on r.id = rr.room_id 
                    LEFT JOIN reservation res on res.id = rr.reservation_id 
                    WHERE (date_from is NULL or date_from NOT BETWEEN "' . htmlspecialchars($date_from, ENT_QUOTES). '" AND "' . htmlspecialchars($date_to, ENT_QUOTES). '")
                    AND (date_to is null or date_to NOT BETWEEN "' . htmlspecialchars($date_from, ENT_QUOTES). '" AND "' . htmlspecialchars($date_to, ENT_QUOTES) . '")';
        $result = @mysqli_query($MySQL, $query);
        if($result){
            $sel_options = "";
            while($row = @mysqli_fetch_array($result)) {
                $sel_options .= '<option value="' . $row['r_id'] . '">' . $row['name'] . '</option>';
            }
            echo $sel_options;
        }
        else{
            echo "";
        }

        mysqli_close($MySQL);

    }

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
        if($result){
            $query  = "SELECT FROM room WHERE id =" . $_POST['room'];
            $result = @mysqli_query($MySQL, $query);
            $room = @mysqli_fetch_array($result);

            $query  = "INSERT INTO room_reservation (room_id, reservation_id, price)";
            $query .= " VALUES ('" . $_POST['room'].
            "', '" . $ID .
            "', '" . $room['price'].
            "')";
            $result2 = @mysqli_query($MySQL, $query);
            $_SESSION['message'] .= '<p>You successfully added reservation!</p>';
        }
        else{
            $_SESSION['message'] .= '<p>Something went wrong!</p>';
        }
        
        
        # Redirect
        header("Location: index.php?menu=8");
    }
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
				min="2020-06-07T00:00" required>
			<label for="date_to">DO *</label>
			<input type="datetime-local" id="date_to"
				name="date_to" value=""
                min="2020-06-07T00:00" required>
                
            <label for="room">Soba:</label>
            <select name="room" id="room" required>
                <option value="">molimo odaberite</option>';
    print '
            </select>

			<label for="person_count">Broj osoba:</label><br />
            <input type="number" name="person_count" value="1">			
			<hr>
			
			<input type="submit" value="Submit">
        </form>
        ';

    print '
    <script>
        $(document).ready(function () {
            $("#date_from").change(function(){
                $.ajax({
                    url: "reservation.php",
                    type: "post",
                    data: {_action_: "get_rooms", date_from: $(this).val(), date_to: $("#date_to").val()},
                    success: function(data){
                        //adds the echoed response to our container
                        $("#room").html(data);
                    }
                });
            });
            $("#date_to").change(function(){
                $.ajax({
                    url: "reservation.php",
                    type: "post",
                    data: {_action_: "get_rooms", date_to: $(this).val(), date_from: $("#date_from").val()},
                    success: function(data){
                        //adds the echoed response to our container
                        $("#room").html(data);
                    }
                });
            });
        });
    </script>
    ';
?>
