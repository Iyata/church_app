<?php

//home controller script

include_once 'lib/messaging.php'; #script for setting status messages


include_once 'model/category_ops/categories.php'; #file that gets all db categories

$my_categories = select_categories(); #variable to store retrieved catgories

include_once'model/activity_ops/church_activity.php'; #file that gets weekly church activities

$activities = get_activities(); #function from model church_activity.php

include_once'model/news_ops/add_news_mod.php'; #file that gets all news feeds

$news = get_news(); #variable to store retrieved feeds

//get messages (if any) for form fields input
$successMessages = getMessages("success");
$errorMessages = getMessages("error");

//get messages (if any) for form mailing lists
$channelMessage = getMessages("channel_error");

//checking if user is already logged in. $log is coming from index2.php
if(isset($log) && !empty($log)) {
	include 'view/home/home2.phtml';
} else{
	include 'view/home/home.phtml';
}
//clear all messages
finishMessages();