<?php
include_once 'model/db_connect.php';

//function to delete category from db
function del_activity($activity_id){

	global $connect;

	$query = "DELETE FROM `church_activity` WHERE `id`='".$activity_id."'";

	if($pass = mysqli_query($connect, $query)){

		//check if a row was actually deleted
		if(mysqli_affected_rows($connect)>0){

			return true;
			
		}else{
			return false;
		}
	}
}
//this script is working fine