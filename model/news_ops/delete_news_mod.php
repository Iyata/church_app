<?php
include_once 'model/db_connect.php';

//function to delete category from db
function del_news($news_id){

	global $connect;

	$query = "DELETE FROM `news_feeds` WHERE `id`='".$news_id."'";

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