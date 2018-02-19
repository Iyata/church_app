<?php
include_once'model/church_activity.php'; #model
include_once'lib/messaging.php'; #error and success message reporting


function new_activity(){
	if(isset($_POST) && !empty($_POST)){
		if(!empty($_POST['activity_name']) && !empty($_POST['venue']) 
			&& !empty($_POST['day']) && !empty($_POST['time'])){

			$activity_name = $_POST['activity_name'];
		$venue = $_POST['venue'];
		$day = $_POST['day'];
		$time = $_POST['time'];

			//instantiate object of class with constructor method
		$object = new SaveActivity($activity_name, $venue, $day, $time);

			//use object to call class method to save record
		$object->save_activity_record();
	} else {
		addMessageRegister('error', 'Fill all fields!');
	}
}
}

/**
* Class to store new activity record to db
*/
class SaveActivity
{
	protected $activity;
	protected $venue;
	protected $day;
	protected $time;
	function __construct($activity, $venue, $day, $time)
	{
		$this->activity = $activity;
		$this->venue = $venue;
		$this->day = $day;
		$this->time = $time;
	}

	function save_activity_record(){

		//call model function to save record
		if(save_activity($this->activity, $this->venue, $this->day, $this->time)){
			
			addMessage('success', 'new activity added');

			//redirect to home page
			header("Location: ?controller=home");
		}else{
			
			addMessageRegister('error', 'Activity not added');
		}
	}
}

//call function to do checks
new_activity();

//die;

//catch messages
$successMessages = getMessages('success');
$errorMessages = getMessagesRegister('error');

include_once 'view/church_activity.phtml'; #view

//clear error messages
finishMessagesRegister();