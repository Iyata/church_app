<?php

/*SQL TO ADD MORE PHONE NUMBERS TO A CATEGORY
UPDATE `contacts` SET `phone`= concat(`phone`, ',', '11111111') WHERE `category`=1
*/

include_once 'lib/messaging.php';
include_once 'model/add_cat.php';


class AddCategory{

  protected $name;
  protected $numbers;

  public function __construct($name, $numbers){
    $this->name = $name;
    $this->numbers = $numbers;
  }

    //method to update both department and contacts table
  function addCat(){

            //call model and check if category is successfully added
    if(add_cat($this->name,$this->numbers)){
      addMessage("success", "New Category added");
      header("Location: index2.php");
    } else{
      addMessageRegister("error", "Category name already exist, choose another name");
    }
  }

//end class
}

function do_checks(){
  if(isset($_POST) && !empty($_POST)){

    if(isset($_SESSION['logged_in'])){

      if(isset($_POST['cat_name']) && !empty($_POST['cat_name'])){

        $name = $_POST['cat_name'];

          //choose only one contacts source
        if(!empty($_POST['csv_upload']) && !empty($_POST['cat_phones'])){

          addMessageRegister("error", "Choose one contacts list source!");

        } else{
          if(!empty($_POST['csv_upload'])){

               //call csvFile() method to open the file and store contents into an array
                    $numbers = csvFile($_POST['csv_upload']);  #uploaded file is the parameter

                  } elseif(!empty($_POST['cat_phones'])){

                    $numbers = pastedContacts($_POST['cat_phones']);

                  }

              //instantiate class to add records to db
                  $object = new AddCategory($name, $numbers);

              //call method to add contacts to db
                  $object->addCat();

                }
              } else{

                addMessageRegister("error", "Fill form properly");

              }
    } else {  #confirm if user adding the category is logged in

      //get current page url and get separate controller portion into index 1 from the rest of the uri
      $current_page_controller = explode('index2.php', $_SERVER['REQUEST_URI']);

      //start session to store current page controller
      $_SESSION['rdrurl'] = $current_page_controller['1'];

      //redirect to login page
      header("Location: ?controller=login_panel");
    }
  }
}


//method to extract csv file contents
function csvFile($csv_file){

  $file_open = fopen($csv_file, 'r');

  //get csv content into an array and return the array
  $numbers = fgetcsv($file_open);

  //implode array to string
  return implode(',', $numbers);

}

//method to properly format pasted contacts
function pastedContacts($pasted_numbers){

    //format sting input properly
    $numbers = ltrim($pasted_numbers, ' ,');    #trims both white spaces and commas at the very end if any
    return $number_clean = rtrim($numbers, ' ,');  #trims both white spaces and commas at the very beginning if any

  }

//call method to do checks
  do_checks();

  $successMessages = getMessagesRegister("success");
  $errorMessages = getMessagesRegister("error");

//get messages (if any) for form mailing lists
  $channelMessage = getMessages("channel_error");

  include_once 'view/add_category.phtml';
  finishMessagesRegister();