<?php
require 'config.php';
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header('Location:index.php');
};

if (isset($_GET['id'])) {
	delete_course($_GET['id']);
	header('Location:view_course.php');
}