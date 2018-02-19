<?php
include_once 'model/history_ops/history.php'; #script holding retrieved message history from db

$messages = getMessages(); #array variable holding returned messages from db

if(isset($_SESSION['logged_in'])){ #ensure only logged in user sees history

	include_once 'view/history_ops/history.phtml'; #view to display history

} else {  #confirm if user viewing history is logged in

	 		//get current page url and get separate controller portion into index 1 from the rest of the uri
	$current_page_controller = explode('index.php', $_SERVER['REQUEST_URI']);

	 		//start session to store current page controller
	$_SESSION['rdrurl'] = $current_page_controller['1'];

	 		//redirect to login page
	header("Location: ?controller=auth_ops/login_panel");
}
