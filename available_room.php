<?php

	# Stop Hacking attempt
	define('__APP__', TRUE);

	# Database connection
	include ("dbconn.php");

    $date_from = $_POST['date_from'];
    $date_to = $_POST['date_to'];
    get_available_rooms($date_from, $date_to);

    function get_available_rooms($date_from, $date_to)
    {    
        $query  = 'SELECT * FROM room r 
                    LEFT JOIN room_reservation rr on r.id = rr.room_id 
                    LEFT JOIN reservation res on res.id = rr.reservation_id 
                    WHERE (date_from is NULL or date_from NOT BETWEEN ' . htmlspecialchars($date_from, ENT_QUOTES). ' AND ' . htmlspecialchars($date_to, ENT_QUOTES). '
                    AND (date_to is null or date_to NOT BETWEEN ' . htmlspecialchars($date_from, ENT_QUOTES). ' AND ' . htmlspecialchars($date_to, ENT_QUOTES);
        $result = @mysqli_query($MySQL, $query);
        if($result){
            $sel_options = "";
            while($row = @mysqli_fetch_array($result)) {
                $sel_options .= '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
            }
            echo $sel_options;
        }
        else{
            echo "";
        }
    }
?>