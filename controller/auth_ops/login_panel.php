<?php

//script for setting login submission status

include_once 'lib/messaging.php';
include_once 'model/auth_ops/login_validate.php';


//function to ensure correctness of user inputs
function form_inputs(){

	if(isset($_POST) && !empty($_POST)){
		if(isset($_POST['username']) && isset($_POST['password'])){
			if(!empty($_POST['username']) && !empty($_POST['password'])){
				$username = $_POST['username'];
				$password = $_POST['password'];

				//call model (found in login_validate.php) function to validate credentials
				if(check_user($username, $password)){
					//echo 'Logged in!'; die;
					$_SESSION['logged_in'] = $username;

					addMessage('success', "$username Logged in!");
					
					//redirect to the previous working page after login
					if(isset($_SESSION['rdrurl'])){

						//takes you back to previous page
						header("Location: ".$_SESSION['rdrurl']);

						//unset the previous url session data after it executes once
						unset($_SESSION['rdrurl']);
						

					} else{
						//or go to home after login
						header("Location: ?controller=home/home");
					}
					
					
				}else{
					//echo 'Invalid credentials'; die;
					addMessageRegister('error', 'Invalid credentials');
				}

			}else{
				//echo 'Fill all fields'; die;
				addMessageRegister('error', 'fill all fields');
			}
		}
	}
}

form_inputs();

//get messages (if any) for form fields input
$errorMessages = getMessagesRegister("error");

include 'view/auth_ops/login_page.phtml';

//clear all error messages
finishMessagesRegister();
