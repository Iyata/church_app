<?php

include_once 'db_connect.php';

function save_news($title, $caption, $link, $date){
	global $connect;

	//var_dump($time); 
	//query to insert into db
	$query = "INSERT INTO `news_feeds`(`id`, `title`, `caption`, `link`, `date`) 
	VALUES(NULL, '".$title."', '".$caption."','".$link."', '".$date."') ";

	// $query = "INSERT INTO `church_activity`(`id`, `name`, `venue`, `Date`, `time`) VALUES (NULL, 'Practice', 'Church', 'Monday', '12:20')";
	if($pass = mysqli_query($connect, $query)){
		return true;
	}

}

//function to select all church activities
function get_news(){
	global $connect;

	//query to select activities
	$query = "SELECT `id`, `title`, `caption`, `link` FROM `news_feeds`";

	//array to hold results
	$news = [];
	if($pass = mysqli_query($connect, $query)){

		while($result = mysqli_fetch_assoc($pass)){
			$news[] = $result;
		}
	}
	return $news;
}