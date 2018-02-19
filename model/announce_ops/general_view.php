<?php

include_once 'model/db_connect.php';
//Retrieve all general announcements from db

//function to select all church announcements
function get_announcements(){ #marriage banns
	

	global $connect;

	//query to select announcements
	$query = "SELECT *, DATE_FORMAT(date,'%d/%m/%Y') AS `date`, TIME_FORMAT(time, '%h:%i %p') AS `time`  FROM `general_announcements` ORDER BY `date` ASC";

	//array to hold results
	$announcements = [];

	if($pass = mysqli_query($connect, $query)){

		while($result = mysqli_fetch_assoc($pass)){
			$announcements[] = $result;
		}

	}
	return $announcements;
}

?>