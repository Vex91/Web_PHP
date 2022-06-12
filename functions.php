<?php 
	function pickerDateToMysql($pickerDate){
		$date = DateTime::createFromFormat('Y-m-d H:i:s', $pickerDate);
		return $date->format('d. m. Y H:i:s');
	}
	function pickerDateTimeToMysql($pickerDate){
		$date = DateTime::createFromFormat('Y-m-dTH:i', $pickerDate);
		return $date->format('d. m. Y H:i:s');
	}
?>