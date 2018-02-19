<?php

include_once 'model/db_connect.php';

function save_announce($call_number, $sponsus, $sponsus_father, $sponsus_mother, $sponsus_native,
	$sponsa, $sponsa_father, $sponsa_mother, $sponsa_native){
	global $connect;
	//var_dump($call_number); die;
	//query to insert into db
	$query = "INSERT INTO `church_announcements`(`call_number`, `sponsus`, `sponsus_father`, `sponsus_mother`, 
		`sponsus_native`, `sponsa`, `sponsa_father`, `sponsa_mother`, `sponsa_native`) 
VALUES('".$call_number."', '".$sponsus."', '".$sponsus_father."', '".$sponsus_mother."', '".$sponsus_native."', 
	'".$sponsa."', '".$sponsa_father."', '".$sponsa_mother."', '".$sponsa_native."') ";

//var_dump($pass = mysqli_query($connect, $query)); die;

if($pass = mysqli_query($connect, $query)){
	return true;
}

}