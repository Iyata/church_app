<?php

include_once 'model/db_connect.php';

//save message record using already stored category
function save_message($from, $message, $to){

  global $connect;

  if($to == "*"){
    $to = 0;
  } 

  //var_dump($to); die;
      //query to select name of receiving department
  $query_select = "SELECT dept_name FROM department WHERE dept_id='".$to."' ";

  if($get_name = mysqli_query($connect,$query_select)){

   while ($dept_name = mysqli_fetch_assoc($get_name)) {

    $name = $dept_name['dept_name'];

      		//insertion query to save message history
    $query_insert = "INSERT INTO `message_history`(`sender`, `message_content`, `receiver`) 
    VALUES ('".$from."', '".$message."', '".$name."')";

		      //pass to db
    if($pass = mysqli_query($connect, $query_insert)){

      return true;

    }
    
  }
}

}

//save message record for pasted list or csv file
function save_message_supplied($from, $message, $to){

  global $connect;
var_dump($message); //die;

      //insertion query to save message history
$query_insert = "INSERT INTO `message_history`(`sender`, `message_content`, `receiver`) 
VALUES ('".$from."', '".$message."', '".$to."')";

      //pass to db
if($pass = mysqli_query($connect, $query_insert)){

  return true;

}

}
