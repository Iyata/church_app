<?php

include_once 'model/db_connect.php';

function save_activity($activity, $venue, $day, $time){
	global $connect;

	var_dump($time); 
	//query to insert into db
	$query = "INSERT INTO `church_activity`(`id`,`name`, `venue`, `date`, `time`) 
	VALUES(NULL, '".$activity."','".$venue."',
		'".$day."','".$time."') ";

	// $query = "INSERT INTO `church_activity`(`id`, `name`, `venue`, `Date`, `time`) VALUES (NULL, 'Practice', 'Church', 'Monday', '12:20')";
if($pass = mysqli_query($connect, $query)){
	return true;
}

}

//function to select all church activities
function get_activities(){
	global $connect;

	//query to select activities
	$query = "SELECT *, TIME_FORMAT(time, '%h:%i %p') AS time FROM `church_activity`";

	//array to hold results
	$activities = [];
	if($pass = mysqli_query($connect, $query)){

		while($result = mysqli_fetch_assoc($pass)){
			$activities[] = $result;
		}
	}
	return $activities;
}