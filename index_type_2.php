<?php

//Entry point to the entire application
//It call any controller sent via the url GET method but has "home.php" as default

session_start();
error_reporting(E_ALL); ini_set('display_errors', 1);

/*this gets whatever address is coming from the url, put it into an array and explodes it using index2.php as delimiter
The array would have two indexes: 0-> everything before the string index2.php
								  1-> anything after the string index2.php

This way, any controller file gets loaded as GET REQUEST on the URL

E.g ...../index2.php?controller=controller_file.php
*/
var_dump($urls = explode('index2.php', $_SERVER['REQUEST_URI'])); //die;

//set the current page according to requested controller file
//is no controller file is set, it goes to home page
$controller = ($urls[1]) ? $urls[1] : 'home';

$log = isset($_SESSION['logged_in']) ?: null;

//variable to hold specified controller file name + .php extension
$route = $controller . ".php";


//include the url path with appropriate controller file
include_once 'controller/' . $route;

?>