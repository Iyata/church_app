<?php

include_once 'lib/messaging.php'; #error message catcher
include_once 'model/reg_ops/register_staff.php'; #model script for validation


//function to ensure correctness of user inputs
function form_inputs(){
	if(isset($_SESSION['logged_in'])){ #check login status
		if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passcon'])) {
			if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['passcon'])) {

			//assign POST variables to local varibles
				$username = $_POST['username'];
				$password = $_POST['password'];
				$passcon = $_POST['passcon'];

				if($password !== $passcon){
					addMessageRegister('error', 'passwords do not match');
				} else{
				//call model function and pass in both username and password as arguments
				//if statement to get success or failure results from model function
					if(store_to_db($username, $password)){

					//clear all previous user sessions
						session_unset($_SESSION['logged_in']);

						$_SESSION['logged_in'] = $username;

					addMessage('success', "$username successfully registered and logged in!"); #general success report to home

					//header to index page with a logged in session active
					header("Location: index.php");
				}elseif(!store_to_db($username, $password)){

					addMessageRegister('error', 'username already exists'); #registration errors only

				}
			}

		} else{
			addMessageRegister('error', 'fill all fields'); #registration errors only
		}
	}
	}  else {  #confirm if user trying to register new user is logged in

	 		//get current page url and get separate controller portion into index 1 from the rest of the uri
		$current_page_controller = explode('index.php', $_SERVER['REQUEST_URI']);

	 		//start session to store current page controller
		$_SESSION['rdrurl'] = $current_page_controller['1'];

	 		//redirect to login page
		header("Location: ?controller=auth_ops/login_panel");
	}
}

form_inputs();

$errorMessages = getMessagesRegister('error'); #registration errors only


include_once 'view/reg_ops/register.phtml';

finishMessagesRegister(); # unset registration errors only