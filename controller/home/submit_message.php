<?php


include_once 'lib/messaging.php'; #error handler using session
include_once'model/message/bulk_send_api.php'; #model file to send message to API
include_once'model/message/save_message.php'; #model file to save sent message

class GetMessage{

  protected $sender;
  protected $message;
  protected $db_receiver;
  protected $pasted_receiver;
  protected $csv_receiver;

//constructor method to set received form values to class attributes
  public function __construct(/*$from, $to, $content, $ch1, $ch2, $ch3*/){

    if(isset($_POST['sender']) && !empty($_POST['sender'])){
      $this->sender = $_POST['sender'];
    }

    if(isset($_POST['message']) && !empty($_POST['message'])){
     $this->message = $_POST['message'];
   }

   if(isset($_POST['dbcontact']) && !empty($_POST['dbcontact'])){
    $this->db_receiver = $_POST['dbcontact'];
  }

  if(isset($_POST['pasted_num']) && !empty($_POST['pasted_num'])){
   $this->pasted_receiver = $_POST['pasted_num'];
 }

 if(isset($_POST['csv_list']) && !empty($_POST['csv_list'])){
   $this->csv_receiver = $_POST['csv_list'];
 }

}

//function to do form input/selection checks
public function DoCheck(){

 if(isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])) { #ensure user is logged in first before sending messages

    //first condition to check if minimum required fields have been set
  if($this->sender && $this->message && ($this->db_receiver || $this->pasted_receiver || $this->csv_receiver)){

        //conditional checks to restrict users picking two mailing lists
    if($this->pasted_receiver && !($this->db_receiver || $this->csv_receiver)){

      $this->pasted();

    } else if($this->db_receiver && !($this->pasted_receiver || $this->csv_receiver)){

      $this->selected();

    } else if($this->csv_receiver && !($this->pasted_receiver || $this->db_receiver)){

      $this->selected_csv();

    } else if(($this->pasted_receiver && $this->csv_receiver) ||
     ($this->pasted_receiver && $this->db_receiver) || 
     ($this->csv_receiver && $this->db_receiver)) {

      addMessage("channel_error", "Choose one channel");

    }
  } else{
    addMessage('error', 'Values not set!');
  }
      } else {  #confirm if user sending message is logged in

          //get current page url and get separate controller portion into index 1 from the rest of the uri
        $current_page_controller = explode('index.php', $_SERVER['REQUEST_URI']);

          //start session to store current page controller
        $_SESSION['rdrurl'] = $current_page_controller['1'];

          //redirect to login page
        header("Location: ?controller=auth_ops/login_panel"); 
          //kill rest of the page so it doesn't load home page
        die;
      }
    }


//CASE 1: WHEN CONTACT LIST IS PASTED
    public function pasted(){

          //api method to send message
          send_to_pasted($this->pasted_receiver, $this->sender, $this->message);

          //save record to company db
          $this->saveMessage($this->sender, $this->message, 'Supplied contacts'); # ID -1 has been reserved for pasted list 

          //status report to the user
          //addMessage("success", "Messages sent successfully!");
        }


//CASE 2: WHEN EXISTING CATEGORY IS SELECTED
        public function selected(){

        //api method to send message 
          send_by_db($this->db_receiver, $this->sender, $this->message);

        //save record to company db
          $this->saveMessage($this->sender, $this->message, $this->db_receiver);

        //status report to the user
        //addMessage("success", "Messages sent successfully!"); //die;
        }

//CASE 3: WHEN CSV file is uploaded

        public function selected_csv(){

          $filename = fopen($this->csv_receiver, 'r');

    $numbers = fgetcsv($filename); #store file content into an array

    $csv_mail_list = implode(',', $numbers); #convert array into single string

    if(!empty($csv_mail_list)){ 

      //send message to retrieved contacts according to category selected
     send_to_pasted($csv_mail_list, $this->sender, $this->message);

       //save record to company db
       $this->saveMessage($this->sender, $this->message, 'File upload'); # ID -2 has been reserved for pasted list

       //status report to the user
       //addMessage("success", "Messages sent successfully!");

     } else{
      addMessage("error", "empty file!");
    }
  }



  public function saveMessage($from, $message, $to){
  //call model file to save message and return true or false
    if(save_message($from, $message, $to)){ # function for db category
      addMessage("success", "Message record saved");
    } elseif (save_message_supplied($from, $message, $to)) { # function forpasted or csv file upload
     addMessage("success", "Message record saved");
   } else{
    addMessage("error", "Message record not saved");
  }
}

//close class
}

//INSTANTIATE GetMessage CLASS OBJECT BELOW
$object = new GetMessage();

$object -> DoCheck();

header("Location: ?controller=home/home");