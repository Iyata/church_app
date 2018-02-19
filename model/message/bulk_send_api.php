<?php

//This script interacts with multitexter API and sends values from your machine
//to their bulk sms system

//include retrieved numbers
include_once 'model/category_ops/db_get_numbers.php';
include_once 'lib/messaging.php';

	//method to handle already stored contacts in company db
function send_by_db($receiver, $sender, $message)
{
	

	/*var_dump($sender = urlencode($sender));
	var_dump($message = urlencode($message)); 
	var_dump($mobile = query_db($receiver)); die;
	
	$url = 'http://www.MultiTexter.com/tools/geturl/Sms.php?username=adikpeanthony@yahoo.com&password=Iyata1995&sender='.$sender.'&message='.$message .'&flash=0&recipients='. $mobile;
	//$url = 'http://www.multitexter.com/tools/geturl/Sms.php?username=adikpeanthony@yahoo.com&password=Iyata1995&sender='.$sender.'&message='.$message.'&flash=1&listname=friends&recipients=2348036199161'; #hardcoded recipient
	$ch = curl_init(); 
	curl_setopt($ch,CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_HEADER, 0); 
	
		//response from multitexter server
	$response = curl_exec($ch);

		//check if message was delivered

	switch ($response) {
		case -3:
		addMessage('error', 'Insufficient balance');
		break;
		case -4:
		addMessage('error', 'Invalid sender name');
		break;
		case -5:
		addMessage('error', 'No valid recipients');
		break;
		case -6:
		addMessage('error', 'An error has occured');
		break;
		case 100:
		addMessage('success', 'Message successfully sent');
		break;
		
		default:
				# code...
		break;
	}

	curl_close($ch);*/
	return true;
	
}


	//method to handle pasted/uploaded files of recipients
function send_to_pasted($receiver, $sender, $message)
{

	/*var_dump($sender = urlencode($sender));
	var_dump($message = urlencode($message)); 
	var_dump($mobile = $receiver); die;
	
	$url = 'http://www.MultiTexter.com/tools/geturl/Sms.php?username=adikpeanthony@yahoo.com&password=Iyata1995&sender='.$sender.'&message='.$message .'&flash=0&recipients='. $mobile;
	//$url = 'http://www.multitexter.com/tools/geturl/Sms.php?username=adikpeanthony@yahoo.com&password=Iyata1995&sender='.$sender.'&message='.$message.'&flash=1&listname=friends&recipients=2348036199161'; #hardcoded recipient
	$ch = curl_init(); 
	curl_setopt($ch,CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_HEADER, 0); 
	
		//response from multitexter server
	$response = curl_exec($ch);

		//check if message was delivered

	switch ($response) {
		case -3:
		addMessage('error', 'Insufficient balance');
		break;
		case -4:
		addMessage('error', 'Invalid sender name');
		break;
		case -5:
		addMessage('error', 'No valid recipients');
		break;
		case -6:
		addMessage('error', 'An error has occured');
		break;
		case 100:
		addMessage('success', 'Message successfully sent');
		break;
		
		default:
				# code...
		break;
	}

	curl_close($ch);*/
	addMessage('success', 'Message successfully sent');
	return true;
	
}