<?php
include_once 'model/db_connect.php';

function getMessages(){
	global $connect;
	$messages = [];
	//Select messages from db
	$query = "SELECT h.`date`, DATE_FORMAT(h.date,'%d/%m/%Y %h:%i %p') AS `date`, h.`message_content`, h.`sender`, h.`receiver` 
			  FROM `message_history` h ORDER BY `date` DESC"; #ADD WHERE CLAUSE LATER

			  if($pass = mysqli_query($connect, $query)){

			  	while($result = mysqli_fetch_assoc($pass)){

			  		$messages[] = $result;
			  	}
			  	return $messages;
			  }
			}

			//, DATE_FORMAT(date,'%d/%m/%Y %h:%i %p') AS `date`, TIME_FORMAT(time, '%h:%i %p') AS `time`  