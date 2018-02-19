
<?php
include_once'model/announce_ops/collection_add.php'; #model
include_once'lib/messaging.php'; #error and success message reporting




class ChurchannounceController {


	public function save() {
		if(isset($_POST) && !empty($_POST)){
			if(!empty($_POST['purpose']) && !empty($_POST['date'])){

				$purpose = $_POST['purpose'];
			$date = $_POST['date'];

			// call class method to save record to db
			$this->save_announce_record($purpose, $date);

		} else {
			addMessageRegister('error', 'Fill all fields!');
		}
	}
}

private function save_announce_record($purpose, $date){

			//call model function to save record
	if(save_collection($purpose, $date)){

		addMessage('success', 'new collection announcement added');

				//redirect to home page
		header("Location: ?controller=home/home");
	}else{

		addMessageRegister('error', 'collection announcement not added');
	}
}
}

$controller = new ChurchannounceController();
$controller->save();


//catch messages
$successMessages = getMessages('success');
$errorMessages = getMessagesRegister('error');

include_once'view/announce_ops/collection_add.phtml'; #view

//clear error messages
finishMessagesRegister();





























/*function new_announce(){
	if(isset($_POST) && !empty($_POST)){
		if(!empty($_POST['announce_name']) && !empty($_POST['venue']) 
			&& !empty($_POST['day']) && !empty($_POST['time'])){

			$announce_name = $_POST['announce_name'];
		$venue = $_POST['venue'];
		$day = $_POST['day'];
		$time = $_POST['time'];

			//instantiate object of class with constructor method
		$object = new Saveannounce($announce_name, $venue, $day, $time);

			//use object to call class method to save record
		$object->save_announce_record();
	} else {
		addMessageRegister('error', 'Fill all fields!');
	}
}
}
*/


/**
* Class to store new announce record to db
*/
/*class Saveannounce
{
	protected $announce;
	protected $venue;
	protected $day;
	protected $time;

	function __construct($announce, $venue, $day, $time)
	{
		$this->announce = $announce;
		$this->venue = $venue;
		$this->day = $day;
		$this->time = $time;
	}

	function save_announce_record(){

		//call model function to save record
		if(save_announce($this->announce, $this->venue, $this->day, $this->time)){
			
			addMessage('success', 'new announce added');

			//redirect to home page
			header("Location: ?controller=home/home");
		}else{
			
			addMessageRegister('error', 'announce not added');
		}
	}
}

//call function to do checks
new_announce();

//die;
*/
