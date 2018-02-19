<?php
include_once 'db_connect.php';

function add_cat($name, $numbers){
  global $connect;
    //construct query to insert into existing categories
  $query = "INSERT INTO `department`(`dept_name`) VALUES('".$name."')";

  if($pass = mysqli_query($connect, $query)){

      //variable to hold id of last insertion
    $new_dept_id = mysqli_insert_id($connect);

    $query2 =  "INSERT INTO `contacts` (`category`, `phone`) VALUES ('".$new_dept_id."', '".$numbers."');";
    if($pass2 = mysqli_query($connect, $query2)){
      
     return true;

   }else{

    return false;
    
  }
}
}