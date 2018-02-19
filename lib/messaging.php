<?php
//ERROR HANDLERS USING SESSION VARIABLE

//catches status message when sending messages
function addMessage($type,$message){
	$_SESSION['message'][$type][] = $message;
}

//checks if message is empty
function getMessages($type){
	return isset($_SESSION['message'][$type]) ?
	$_SESSION['message'][$type]: null;
}

//unsets the session
function finishMessages(){
	unset($_SESSION['message']);
}

//REGISTRATION STATUS REPORTS
function addMessageRegister($type,$message){
	$_SESSION['register'][$type][] = $message;
}

//checks if message is empty
function getMessagesRegister($type){
	return isset($_SESSION['register'][$type]) ?
	$_SESSION['register'][$type]: null;
}

//unsets the session
function finishMessagesRegister(){
	unset($_SESSION['register']);
}
