<?php
//controller for this model is submit_login.php

//function to validate input data with db values

function check_user($username, $password){

	include_once 'model/db_connect.php';

	//build query
	$query = "SELECT `id`, `username` FROM `staff_login` WHERE `username` = '".$username."' AND `password` = '".$password."';";
	
	//pass query to db
	if($pass = mysqli_query($connect, $query)){

		//check and return username if credentials exist
		if(mysqli_num_rows($pass) == 1){

			return true;
			
		} else{
			return false;
		}
	}

}


//var_dump(check_user('tony', 'tony'));
?>