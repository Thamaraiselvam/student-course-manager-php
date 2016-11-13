<?php

include_once 'header.php';


if (isset($_GET['id'])) {
	delete_student($_GET['id']);
	header('Location:view_student.php');
}