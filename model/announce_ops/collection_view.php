<?php

include_once 'model/db_connect.php';
//Retrieve all general collection from db

//function to select all church collection
function get_collections(){ #marriage banns
	

	global $connect;

	//query to select collection
	$query = "SELECT *, DATE_FORMAT(date,'%d/%m/%Y') AS `date` FROM `church_collection` ORDER BY `date` DESC";

	//array to hold results
	$collection = [];

	if($pass = mysqli_query($connect, $query)){

		while($result = mysqli_fetch_assoc($pass)){
			$collection[] = $result;
		}

	}
	return $collection;
}

?>