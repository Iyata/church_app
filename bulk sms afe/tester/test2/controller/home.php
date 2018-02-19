<?php

//script for setting submission status

/*include_once 'submit_category.php';*/
include_once 'lib/messaging.php';
//include_once '/model/categories.php';

include_once 'model/categories.php'; #file that gets all db categories

$my_categories = select_categories(); #variable to store retrieved catgories

include_once'model/church_activity.php'; #file that gets weekly church activities

$activities = get_activities(); #function from model church_activity.php

//get messages (if any) for form fields input
$successMessages = getMessages("success");
$errorMessages = getMessages("error");

//get messages (if any) for form mailing lists
$channelMessage = getMessages("channel_error");

//checking if user is already logged in. $log is coming from index2.php
if(isset($log) && !empty($log)) {
	include 'view/home2.phtml';
} else{
	include 'view/home.phtml';
}
//clear all messages
finishMessages();