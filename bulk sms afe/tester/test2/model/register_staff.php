<?php
include_once 'db_connect.php';

function store_to_db($username, $password){
	global $connect;

	//query to check if username already exists
	$query = "SELECT * FROM `staff_login` WHERE `username` = '".$username."'";

	//Query db
	if($pass = mysqli_query($connect,$query)){
		//check if at least one row was returned
		if(mysqli_num_rows($pass)>=1){
			return false; #since username already exists, controller should send error message

		}else{
			//query to add new record to db
			$query2 = "INSERT INTO `staff_login`(`username`, `password`) VALUES('".$username."', '".$password."')";

			if($pass2 = mysqli_query($connect, $query2)){
				return true; # new user records have been stored, controller should send success message

			}
		}
	}
}