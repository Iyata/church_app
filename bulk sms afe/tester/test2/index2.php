<?php

//Entry point to the entire application
//It call any controller sent via the url GET method but has "home.php" as default

session_start();
error_reporting(E_ALL); ini_set('display_errors', 1);

//set the current page according to requested controller file
//is no controller file is set, it goes to home page
$controller = isset($_GET["controller"]) ? $_GET["controller"] : 'home';

$log = isset($_SESSION['logged_in']) ?: null;

//variable to hold specified controller file name + .php extension
$route = $controller . ".php";


//include the url path with appropriate controller file
include_once 'controller/' . $route;