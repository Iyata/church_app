<?php
include_once'model/announce_ops/church_announcement.php'; #model
include_once'lib/messaging.php'; #error and success message reporting




class ChurchannounceController {


	public function save() {
		if(isset($_POST) && !empty($_POST)){
			if(!empty($_POST['sponsus']) && !empty($_POST['sponsus_father'] && !empty($_POST['sponsus_mother'])) 
				&& !empty($_POST['sponsus_native']) && !empty($_POST['sponsa']) && !empty($_POST['sponsa_father'] 
					&& !empty($_POST['sponsa_mother'])) && !empty($_POST['sponsa_native']) && !empty($_POST['call_number'])){

				$call_number = $_POST['call_number'];
				$sponsus = $_POST['sponsus'];
			$sponsus_father = $_POST['sponsus_father'];
			$sponsus_mother = $_POST['sponsus_mother'];
			$sponsus_native = $_POST['sponsus_native'];
			$sponsa = $_POST['sponsa'];
			$sponsa_father = $_POST['sponsa_father'];
			$sponsa_mother = $_POST['sponsa_mother'];
			$sponsa_native = $_POST['sponsa_native'];

			// call class method to save record to db
			$this->save_announce_record($call_number, $sponsus, $sponsus_father, $sponsus_mother, $sponsus_native,
										$sponsa, $sponsa_father, $sponsa_mother, $sponsa_native);

		} else {
			addMessageRegister('error', 'Fill all fields!');
		}
	}
}

private function save_announce_record($call_number, $sponsus, $sponsus_father, $sponsus_mother, $sponsus_native,
										$sponsa, $sponsa_father, $sponsa_mother, $sponsa_native){

			//call model function to save record
	if(save_announce($call_number, $sponsus, $sponsus_father, $sponsus_mother, $sponsus_native,
										$sponsa, $sponsa_father, $sponsa_mother, $sponsa_native)){

		addMessage('success', 'new marriage bann added');

				//redirect to home page
		header("Location: ?controller=home/home");
	}else{

		addMessageRegister('error', 'marriage bann not added');
	}
}
}

$controller = new ChurchannounceController();
$controller->save();


//catch messages
$successMessages = getMessages('success');
$errorMessages = getMessagesRegister('error');

include_once 'view/announce_ops/marriage_bann_add.phtml'; #view

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
