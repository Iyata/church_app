<?php

include_once 'model/db_connect.php';
//Retrieve all announcements from db

//function to select all church announcements
function get_announcement(){ #marriage banns
	

	global $connect;

	//query to select announcements
	$query = "SELECT * FROM `church_announcements` ORDER BY `call_number` ASC";

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