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
	    }
	} else {
	    return 'No students found';
	}
	return $users;
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
	$sql = "UPDATE `users` SET
`email` = '".$email."',
`fullname` = '".$fullname."',
`address` = '".$address."',
`reg_no` = '".$reg_no."'
WHERE `id` = ".$id.";";
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
