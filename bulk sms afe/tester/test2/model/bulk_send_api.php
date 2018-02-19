<?php

//This script interacts with multitexter API and sends values from your machine
//to their bulk sms system

//include retrieved numbers
include_once 'db_get_numbers.php';

	//method to handle already stored contacts in company db
function send_by_db($receiver, $sender, $message)
{
	

	$sender = urlencode($sender);
	$message = urlencode($message); 
	return $mobile = query_db($receiver);
	
		/*$url = 'http://www.MultiTexter.com/tools/geturl/Sms.php?username=adikpeanthony@yahoo.com&password=Iyata1995&sender='.$sender.'&message='.$message .'&flash=0&recipients='. $mobile;
		//$url = 'http://www.multitexter.com/tools/geturl/Sms.php?username=adikpeanthony@yahoo.com&password=Iyata1995&sender='.$sender.'&message='.$message.'&flash=1&listname=friends&recipients=2348036199161'; #hardcoded recipient
		$ch = curl_init(); 
		curl_setopt($ch,CURLOPT_URL, $url); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		$resp = curl_exec($ch); 
		curl_close($ch);*/
		//return 'Reached';
		
	}

	//method to handle pasted/uploaded files of recipients
	function send_to_pasted($receiver, $sender, $message)
	{

		$sender = urlencode($sender).'<br>';
		$message = urlencode($message).'<br>'; 
		$mobile = $receiver.'<br>';

		/*
		$url = 'http://www.MultiTexter.com/tools/geturl/Sms.php?username=adikpeanthony@yahoo.com&password=Iyata1995&sender='.$sender.'&message='.$message .'&flash=0&recipients='. $mobile;
		//$url = 'http://www.multitexter.com/tools/geturl/Sms.php?username=adikpeanthony@yahoo.com&password=Iyata1995&sender='.$sender.'&message='.$message.'&flash=1&listname=friends&recipients=2348036199161'; #hardcoded recipient
		$ch = curl_init(); 
		curl_setopt($ch,CURLOPT_URL, $url); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		$resp = curl_exec($ch); 
		curl_close($ch);*/

	}

	?>