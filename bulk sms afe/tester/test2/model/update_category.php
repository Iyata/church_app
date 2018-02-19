<?php
include_once 'db_connect.php';

//function to delete category from db
function update_cat($cat_id, $new_numbers){

	global $connect;

	$query = "UPDATE `contacts` SET `phone`= concat(`phone`, ',', '".$new_numbers."') WHERE `category`='".$cat_id."' ";

	if($pass = mysqli_query($connect, $query)){

		//check if a row was actually deleted
		if(mysqli_affected_rows($connect)>0){

			return true;
			
		}else{
			return false;
		}
	}
}