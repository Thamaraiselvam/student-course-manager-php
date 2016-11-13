<?php 
session_start();
error_reporting(-1);
ini_set('display_errors', 'On');
global $con;
$con = mysqli_connect('localhost', 'root', 'root', 'sm');
if (empty($con)) {
	die("conection failed");
}

require 'common-functions.php';