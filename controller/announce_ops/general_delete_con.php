<?php

//include model script retrieving activities
include_once'model/announce_ops/general_view.php'; #model
include_once'lib/messaging.php'; #error and success message reporting #fetches activities for the view to display

include_once 'model/announce_ops/general_delete.php'; #model script with delete function del_announcement()

//array variable to store retrieved activities
$general = get_announcements();
finishMessages(); #clear previous success messages

//call method to delete selected category

function send_id_to_delete(){	
	if(isset($_POST['general'])){
			if(isset($_SESSION['logged_in'])){ #check login status
				if(!empty($_POST['general'])){
					$general_id = $_POST['general'];

				//call model function to delete
					if(del_general($general_id)){
						return true;	
					}
				}
		} else {  #confirm if user deleting the category is logged in

	 		//get current page url and get separate controller portion into index 1 from the rest of the uri
			$current_page_controller = explode('index.php', $_SERVER['REQUEST_URI']);

	 		//start session to store current page controller
			$_SESSION['rdrurl'] = $current_page_controller['1'];

	 		//redirect to login page
			header("Location: ?controller=auth_ops/login_panel");
		}
	}
}

function check_delete(){
	if(send_id_to_delete()){
		//create a session that would determine when an error message gets cleared
		
		//add header and a success message to the delete category view
		addMessage('success', 'general announcement deleted successfuly');
		header("Refresh:2"); # Refresh the page after 5 seconds to reflect delete

	}
}


check_delete();

$successMessages = getMessages('success');


//include a view file where a user can select general to delete
include_once'view/announce_ops/general_delete.phtml';