<?php

//include model script retrieving activities
include_once 'model/news_ops/add_news_mod.php'; #fetches activities for the view to display

include_once 'model/news_ops/delete_news_mod.php'; #model script with delete function del_news()

include_once 'lib/messaging.php'; #file with functions for error reporting

//array variable to store retrieved activities
$news = get_news(); #variable to store retrieved feeds

finishMessages(); #clear previous success messages

//call method to delete selected category

function send_id_to_delete(){	
	if(isset($_POST['news'])){
			if(isset($_SESSION['logged_in'])){ #check login status
				if(!empty($_POST['news'])){
					$news_id = $_POST['news'];

				//call model function to delete
					if(del_news($news_id)){
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
		addMessage('success', 'news deleted successfuly');
		header("Refresh:3"); # Refresh the page after 5 seconds to reflect delete

	}
}


check_delete();

$successMessages = getMessages('success');


//include a view file where a user can select news to delete
include_once'view/news_ops/delete_news.phtml';