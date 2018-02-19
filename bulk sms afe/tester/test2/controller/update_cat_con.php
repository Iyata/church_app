<?php

//controller for view/update_category.phtml and model/update_catogory.php


include_once'model/update_category.php'; #model for performing category update
include_once'model/categories.php'; #model for selecting existing categories from db
include_once 'lib/messaging.php'; #file with functions for error reporting



//include a list of categories for selection from db via a model file
$categories = select_categories();

//do checks to validate user selection of category to update
function send_id_to_update(){	
	if(isset($_POST['cat'])){
			if(isset($_SESSION['logged_in'])){ #check login status
				if(!empty($_POST['cat']) && !empty($_POST['new_numbers'])){
					$cat_id = $_POST['cat'];
					$new_numbers = $_POST['new_numbers'];

				//call model to perform update
					if(update_cat($cat_id, $new_numbers)){
						return true;	
					}
				} else{
				//addMessageRegister  Error
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

function check_update(){
	if(send_id_to_update()){
		//create a session that would determine when an error message gets cleared
		
		//add header and a success message to the update category view
		addMessageRegister('success', 'category updated successfuly');

		header("Location: ?controller=view_controller"); # Redirect the page to view new contacts list

	}
}

check_update();

include_once'view/update_category.phtml'; #view