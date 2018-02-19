<?php

//This script selects and stores all existing categories in an array from the db
//the controller for this is view_controller.php
//this has been included in both home.php and view_controller.php controllers

include_once 'db_connect.php';

function select_categories(){
  global $connect;
  
  $query = "SELECT d.dept_id, d.dept_name, c.phone FROM department d LEFT JOIN contacts c ON d.dept_id = c.category ORDER BY dept_name ASC";

  if($pass = mysqli_query($connect, $query)){

     //array to get fetched db category
    $categories = [];

    while ($result = mysqli_fetch_assoc($pass)) {

      $categories[] = $result;
      
    }
    
    return $categories;

  } else{

        return false; #if department name already exists
      }

      //all dept names and dept ids
      
     //var_dump($categories); //die;
    }


//not done yet!
    function select_numbers(){
      global $connect;
      
      $query = "SELECT `phone` FROM `contacts`";

      if($pass = mysqli_query($connect, $query)){

     //array to get fetched db numbers
        $numbers = [];

        while ($result = mysqli_fetch_assoc($pass)) {

          $numbers[] = $result;
          
        }
        //$combined = array_combine($dept_id, $dept_name);
      }
      //all dept names and dept ids
      return $numbers;
    }

//select_numbers();
//select_categories();
    ?>