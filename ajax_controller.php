<?php
require './config.php';

root_controller();
function root_controller(){
	$action = $_POST['action'];
	if(empty($action)){
		die(json_encode(array('error'=> 'no action found')));
	}
	call_user_func($action);
}

function add_sem_course(){
	global $con;
	if(!can_user_add_course_by_sem($_POST['sem_type'])){
		die(json_encode(array('error'=> 'You have already enrolled 4 courses to this semester, Please disenroll a course to enroll new one !')));
	}
	$sql = "INSERT INTO `enrolled_courses` (`user_id`, `course_id`, `sem_type`)
VALUES ('".$_POST['user_id']."', '".$_POST['course_id']."', '".$_POST['sem_type']."');";
	$result = $con->query($sql);
	if (empty($result)) {
		die(json_encode(array('error'=> 'You have already added this course !')));
	}
	die(json_encode(array('success'=> 'New course added !')));

}


function remove_sem_course(){
	global $con;
	$sql = "DELETE FROM `enrolled_courses` WHERE `user_id` = '".$_POST['user_id']."' AND `course_id` = '".$_POST['course_id']."' AND `sem_type` = '".$_POST['sem_type']."';";
	$result = $con->query($sql);
	die(json_encode(array('success'=> 'Course disenroll')));
}