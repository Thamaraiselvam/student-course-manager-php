<?php

include_once 'header.php';


if (isset($_GET['id'])) {
	delete_course($_GET['id']);
	header('Location:view_course.php');
}