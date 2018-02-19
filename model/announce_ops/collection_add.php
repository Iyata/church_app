<?php

include_once 'model/db_connect.php';

function save_collection($purpose, $date){
	global $connect;
	//var_dump($call_number); die;
	//query to insert into db
	$query = "INSERT INTO `church_collection`(`purpose`, `date`) 
VALUES('".$purpose."', '".$date."') ";

//var_dump($pass = mysqli_query($connect, $query)); die;

if($pass = mysqli_query($connect, $query)){
	return true;
}

}