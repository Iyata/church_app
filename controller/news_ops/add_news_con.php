<?php
include_once'model/news_ops/add_news_mod.php'; #model
include_once'lib/messaging.php'; #error and success message reporting


function new_feed(){
	if(isset($_POST) && !empty($_POST)){
		if(!empty($_POST['news_title']) && !empty($_POST['news_caption']) && !empty($_POST['link']) 
			&& !empty($_POST['date'])){
			$news_title = $_POST['news_title'];
			$news_caption = $_POST['news_caption'];
		$link = $_POST['link'];
		$date = $_POST['date'];

			//instantiate object of class with constructor method
		$object = new Savenews($news_title, $news_caption, $link, $date);

			//use object to call class method to save record
		$object->save_news_record();
	} else {
		addMessageRegister('error', 'Fill all fields!');
	}
}
}

/**
* Class to store new news record to db
*/
class Savenews
{
	protected $news_title;
	protected $news;
	protected $link;
	protected $date;
	
	function __construct($title, $news, $link, $date)
	{
		$this->news_title = $title;
		$this->news = $news;
		$this->link = $link;
		$this->date = $date;
	}

	function save_news_record(){

		//call model function to save record
		if(save_news($this->news_title, $this->news, $this->link, $this->date)){
			
			addMessage('success', 'news feed added');

			//redirect to home page
			header("Location: ?controller=home/home");
		}else{
			
			addMessageRegister('error', 'News feed not added');
		}
	}
}

//call function to do checks
new_feed();

//die;

//catch messages
$successMessages = getMessages('success');
$errorMessages = getMessagesRegister('error');

include_once 'view/news_ops/add_news.phtml'; #view

//clear error messages
finishMessagesRegister();