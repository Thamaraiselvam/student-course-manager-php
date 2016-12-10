<?php

function validate_login($username, $password, $type){
	global $con;
	$sql = "select * from users where email='".$username."' AND password='".md5($password)."'";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	if ($row['type'] != $type) {
	    		return 'Not an valid authorization';
	    	}
	    	$_SESSION['user_id'] = $row["id"];
	    	$_SESSION['user_email'] = $username;
	    	$_SESSION['user_password'] = $password;
	    	$_SESSION['user_type'] = $type;
	    	$_SESSION['user_fullname'] = $row["fullname"];
	    	return true;
	    }
	} else {
	    return 'Invalid credentials';
	}
}		

function add_new_student($email, $fullname, $password, $reg_no, $address){
	global $con;
	$sql = "INSERT INTO `users` (`email`, `password`, `fullname`, `address`, `type`, `reg_no`)
VALUES ('".$email."', md5('".$password."'), '".$fullname."', '".$address."', 'student', '".$reg_no."');";
	$result = $con->query($sql);
	if (!empty($result)) {
		return true;
	}

}		


function get_all_students(){
	global $con;
	$sql = "select * from users where type='student'";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    $i=0;
	    while($row = $result->fetch_assoc()) {
	    	$i++;
	    	$users[$i]['id'] = $row["id"];
	    	$users[$i]['fullname'] = $row["fullname"];
	    	$users[$i]['email'] = $row["email"];
	    	$users[$i]['reg_no'] = $row["reg_no"];
	    	$users[$i]['address'] = $row["address"];
	    }
	} else {
	    return 'No students found';
	}
	return $users;
}	

function get_student($id){
	global $con;
	$sql = "select * from users where type='student' AND id=".$id;
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	$users['id'] = $row["id"];
	    	$users['fullname'] = $row["fullname"];
	    	$users['email'] = $row["email"];
	    	$users['reg_no'] = $row["reg_no"];
	    	$users['address'] = $row["address"];
	    	$users['phone_number'] = $row["phone_number"];
	    }
	} else {
	    return 'No students found';
	}
	return $users;
}

function can_user_add_course_by_sem($type){
	global $con;
	$sql = "select * from enrolled_courses where sem_type='".$type."' AND user_id=".$_SESSION['user_id'];
	$result = $con->query($sql);
	if ($result->num_rows >= 4) {
		return false;
    } else {
	    return true;
	}
}

function get_course($id){
	global $con;
	$sql = "select * from courses where id=".$id;
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
			$course['id'] = $row["id"];
			$course['name'] = $row["name"];
			$course['professor'] = $row["professor"];
			$course['days'] = $row["days"];
			$course['start_time'] = $row["start_time"];
			$course['end_time'] = $row["end_time"];
			$course['description'] = $row["description"];
	    }
	} else {
	    return 'No students found';
	}
	return $course;
}

function delete_student($id){
	global $con;
	$sql = "DELETE FROM `users` WHERE ((`id` = '".$id."'));";
	$result = $con->query($sql);
}

function delete_course($id){
	global $con;
	$sql = "DELETE FROM `courses` WHERE ((`id` = '".$id."'));";
	$result = $con->query($sql);
}

function edit_student( $id, $email, $fullname, $reg_no, $address){
	global $con;
	if ($_SESSION['user_type'] == 'admin' ) {
			$sql = "UPDATE `users` SET
		`email` = '".$email."',
		`fullname` = '".$fullname."',
		`address` = '".$address."',
		`reg_no` = '".$reg_no."'
		WHERE `id` = ".$id.";";
	} else {
		$sql = "UPDATE `users` SET
		`email` = '".$email."',
		`fullname` = '".$fullname."',
		`address` = '".$address."',
		`phone_number` = '".$reg_no."'
		WHERE `id` = ".$id.";";
	}
	$result = $con->query($sql);
	
}

function edit_course($id, $course_name, $course_prof, $course_days, $course_start_time, $course_end_time, $description){
	global $con;
	$sql = "UPDATE `courses` SET
`name` = '".$course_name."',
`professor` = '".$course_prof."',
`days` = '".serialize($course_days)."',
`start_time` = '".$course_start_time."',
`end_time` = '".$course_end_time."',
`description` = '".$description."'
WHERE `id` = ".$id.";";
	$result = $con->query($sql);
	
}

function add_new_course($course_name, $course_prof, $course_days, $course_start_time, $course_end_time, $description){
	global $con;
	$sql = "INSERT INTO `courses` (`name`, `professor`, `days`, `start_time`, `end_time`, `description`)
VALUES ('".$course_name."', '".$course_prof."', '".serialize($course_days)."', '".$course_start_time."', '".$course_end_time."', '".$description."');";
	$result = $con->query($sql);
	if (!empty($result)) {
		return true;
	}
}


function get_all_courses(){
	global $con;
	$sql = "select * from courses";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    $i=0;
	    while($row = $result->fetch_assoc()) {
	    	$i++;
	    	$courses[$i]['id'] = $row["id"];
	    	$courses[$i]['name'] = $row["name"];
	    	$courses[$i]['professor'] = $row["professor"];
	    	$courses[$i]['days'] = $row["days"];
	    	$courses[$i]['start_time'] = $row["start_time"];
	    	$courses[$i]['end_time'] = $row["end_time"];
	    	$courses[$i]['description'] = $row["description"];
	    }
	} else {
	    return 'No courses found';
	}
	return $courses;
}

function get_all_enrolled_courses($type){
	global $con;
	$sql = "select * from enrolled_courses where sem_type='".$type."' AND user_id=".$_SESSION['user_id'];
	$course_result = $con->query($sql);
	$courses = array();
	$i=0;
	if ($course_result->num_rows > 0) {
		while($course_row = $course_result->fetch_assoc()) {
			$i++;
			// print_r($course_row['course_id']);
			$course_sql = "select * from courses WHERE id=".$course_row['course_id'];
			$result = $con->query($course_sql);
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$courses[$i]['id'] = $row["id"];
					$courses[$i]['name'] = $row["name"];
					$courses[$i]['professor'] = $row["professor"];
					$courses[$i]['days'] = $row["days"];
					$courses[$i]['start_time'] = $row["start_time"];
					$courses[$i]['end_time'] = $row["end_time"];
					$courses[$i]['description'] = $row["description"];
				}
			}
		}
	} else {
		return false;
	}

	return $courses;
}

function get_all_unenrolled_courses($type){
	global $con;
	$sql = "select * from enrolled_courses where sem_type='".$type."' AND user_id=".$_SESSION['user_id'];
	$course_result = $con->query($sql);
	$enrolled_courses = array();
	if ($course_result->num_rows > 0) {
		while($course_row = $course_result->fetch_assoc()) {
			$enrolled_courses[] = $course_row['course_id'];
		}
	}
	$all_course = get_all_courses();
	foreach ($all_course as $key => $value) {
		if(array_search($value['id'], $enrolled_courses) !== false){
			unset($all_course[$key]);
		}

	}
	return $all_course;
}


function get_all_enrolled_schedule($type){
	$courses = get_all_enrolled_courses($type);
	$result['Monday'] = '';
	$result['Tuesday'] = '';
	$result['Wednesday'] = '';
	$result['Thursday'] = '';
	$result['Friday'] = '';
	if (empty($courses)) {
		return false;
	}
	foreach ($courses as $key => $course) {
		$days = unserialize($course['days']);
		if (array_search('Monday', $days) !== FALSE) {
			if (empty($result['Monday'])) {
				$result['Monday'] .= $course['name'].' ('.$course['start_time'].'-'.$course['end_time'].')';
			} else {
				$result['Monday'] .= " && ".$course['name'].' ('.$course['start_time'].'-'.$course['end_time'].')';
			}
		}

		if (array_search('Tuesday', $days) !== FALSE) {
			if (empty($result['Tuesday'])) {
				$result['Tuesday'] .= $course['name'].' ('.$course['start_time'].'-'.$course['end_time'].')';
			} else {
				$result['Tuesday'] .= " && ".$course['name'].' ('.$course['start_time'].'-'.$course['end_time'].')';
			}
		}

		if (array_search('Wednesday', $days) !== FALSE) {
			if (empty($result['Wednesday'])) {
				$result['Wednesday'] .= $course['name'].' ('.$course['start_time'].'-'.$course['end_time'].')';
			} else {
				$result['Wednesday'] .= " && ".$course['name'].' ('.$course['start_time'].'-'.$course['end_time'].')';
			}
		}

		if (array_search('Thursday', $days) !== FALSE) {
			if (empty($result['Thursday'])) {
				$result['Thursday'] .= $course['name'].' ('.$course['start_time'].'-'.$course['end_time'].')';
			} else {
				$result['Thursday'] .= " && ".$course['name'].' ('.$course['start_time'].'-'.$course['end_time'].')';
			}
		}

		if (array_search('Friday', $days) !== FALSE) {
			if (empty($result['Friday'])) {
				$result['Friday'] .= $course['name'].' ('.$course['start_time'].'-'.$course['end_time'].')';
			} else {
				$result['Friday'] .= " && ".$course['name'].' ('.$course['start_time'].'-'.$course['end_time'].')';
			}
		}
	}
	return $result;
}

function get_enrolled_courses_count($type){
	global $con;
	$sql = "select * from enrolled_courses where sem_type='".$type."' AND user_id=".$_SESSION['user_id'];
	$course_result = $con->query($sql);
	return $course_result->num_rows;
}


function get_students_count(){
	global $con;
	$sql = "select * from users where type='student'";
	$course_result = $con->query($sql);
	return $course_result->num_rows;
}


function get_courses_count(){
	global $con;
	$sql = "select * from courses";
	$course_result = $con->query($sql);
	return $course_result->num_rows;
}
