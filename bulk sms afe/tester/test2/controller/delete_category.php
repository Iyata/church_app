<?php

//include model script retrieving categories
include_once 'model/categories.php'; #fetches categories for the view to display

include_once 'model/delete_cat.php'; #model script with delete function del_cat()

include_once 'lib/messaging.php'; #file with functions for error reporting

//array variable to store retrieved categories
$categories = select_categories();
finishMessages(); #clear previous success messages

//call method to delete selected category

function send_id_to_delete(){	
	if(isset($_POST['cat'])){
			if(isset($_SESSION['logged_in'])){ #check login status
				if(!empty($_POST['cat'])){
					$cat_id = $_POST['cat'];

				//call model function to delete
					if(del_cat($cat_id)){
						return true;	
					}
				}
		} else {  #confirm if user deleting the category is logged in

	 		//get current page url and get separate controller portion into index 1 from the rest of the uri
			$current_page_controller = explode('index2.php', $_SERVER['REQUEST_URI']);

	 		//start session to store current page controller
			$_SESSION['rdrurl'] = $current_page_controller['1'];

	 		//redirect to login page
			header("Location: ?controller=login_panel");
		}
	}
}

function check_delete(){
	if(send_id_to_delete()){
		//create a session that would determine when an error message gets cleared
		
		//add header and a success message to the delete category view
		addMessage('success', 'category deleted successfuly');
		header("Refresh:5"); # Refresh the page after 5 seconds to reflect delete

	}
}


check_delete();

$successMessages = getMessages('success');


//include a view file where a user can select category to delete
include_once 'view/select_cat_del.phtml';
