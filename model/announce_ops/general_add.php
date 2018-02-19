<?php

include_once 'model/db_connect.php';

function save_general($announcer, $event, $date, $time, $venue){
	global $connect;
	//var_dump($call_number); die;
	//query to insert into db
	$query = "INSERT INTO `general_announcements`(`announcer`, `event`, `date`, `time`, 
		`venue`) 
VALUES('".$announcer."', '".$event."', '".$date."', '".$time."', '".$venue."') ";

//var_dump($pass = mysqli_query($connect, $query)); die;

if($pass = mysqli_query($connect, $query)){
	return true;
}

}