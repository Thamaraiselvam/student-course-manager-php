<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
global $con;
$con = mysqli_connect('localhost', 'root', 'root', 'sm');
if (empty($con)) {
	die("conection failed");
}

require 'common-functions.php';