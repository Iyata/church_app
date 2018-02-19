<?php

include_once 'db_connect.php';

function getMessages(){
	global $connect;
	$messages = [];
	//Select messages from db
	$query = "SELECT h.`date`, h.`message_content`, h.`sender`, h.`receiver` 
			  FROM `message_history` h ORDER BY `date` DESC"; #ADD WHERE CLAUSE LATER

			  if($pass = mysqli_query($connect, $query)){

			  	while($result = mysqli_fetch_assoc($pass)){

			  		$messages[] = $result;
			  	}
			  	return $messages;
			  }
			}