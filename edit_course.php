<?php 
include_once 'header.php';
include_once 'admin_menu.php';

// if (isset($_GET['id']) && isset($POST['email'])) {
//     header("Location:edit_student.php?id=".$GET['id']);
// } 
if ($_GET['id']) {
    $result = get_course($_GET['id']);
} else {
    die();
}

include_once 'footer.php';

?>
   <div id="page-wrapper">
                
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Course management
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <h4>Edit Course</h4>
                                    <form role="form" method="post" action="#">
                                        <div class="form-group ">
                                            <input type="text" class="form-control" value="<?php echo isset($_POST['course_name']) ? $_POST['course_name'] : $result['name'];?>" required="required" name="course_name" placeholder="Course Name">
                                        </div>
                                         <div class="form-group ">
                                            <input type="text" class="form-control" value="<?php echo isset($_POST['course_prof']) ? $_POST['course_prof'] : $result['professor'];?>" required="required" name="course_prof" placeholder="course_prof">
                                        </div>

                                          <div class="form-group">
                                            <label>Course day</label><br>
                                            <?php $course_days = unserialize($result['days']); ?>
                                            <label class="checkbox-inline">
                                                <input name="course_days[]"  value="Monday" <?php if(isset($_POST['course_days'])){if(array_search('Monday', $_POST['course_days']) !== false) echo "checked"; }  else{if(array_search('Monday', $course_days) !== false) echo "checked";} ?>   type="checkbox">Monday
                                            </label>
                                            <label class="checkbox-inline">
                                                <input name="course_days[]"  type="checkbox" <?php if(isset($_POST['course_days'])){if(array_search('Tuesday', $_POST['course_days']) !== false) echo "checked"; }  else{if(array_search('Tuesday', $course_days) !== false) echo "checked";} ?> value="Tuesday">Tuesday
                                            </label>
                                            <label class="checkbox-inline">
                                                <input name="course_days[]"  type="checkbox" <?php if(isset($_POST['course_days'])){if(array_search('Wednesday', $_POST['course_days']) !== false) echo "checked"; }  else{if(array_search('Wednesday', $course_days) !== false) echo "checked";} ?> value="Wednesday">Wednesday
                                            </label>
                                            <label class="checkbox-inline">
                                                <input name="course_days[]"  type="checkbox" <?php if(isset($_POST['course_days'])){if(array_search('Thursday', $_POST['course_days']) !== false) echo "checked"; }  else{if(array_search('Thursday', $course_days) !== false) echo "checked";} ?> value="Thursday">Thursday
                                            </label>
                                            <label class="checkbox-inline">
                                                <input name="course_days[]"  type="checkbox" <?php if(isset($_POST['course_days'])){if(array_search('Friday', $_POST['course_days']) !== false) echo "checked"; }  else{if(array_search('Friday', $course_days) !== false) echo "checked";} ?> value="Friday">Friday
                                            </label>
                                        </div>

                                        <label>Class start</label>
                                        <select name="course_start_time" class="form-control">
                                        <?php $time = array('9AM', '10AM', '11AM', '12PM', '1PM', '2PM' , '3PM', '4PM', '5PM');
                                            foreach ($time as $key) {
                                                if (isset($_POST['course_start_time'])){
                                                    if($key == $_POST['course_start_time']){
                                                        echo "<option value='$key' selected>$key</option> ";
                                                    } else {
                                                        echo "<option value='$key'>$key</option> ";
                                                    }
                                                } else if($key == $result['start_time']) {
                                                        echo "<option value='$key' selected>$key</option> ";
                                                } else {
                                                    echo "<option value='$key'>$key</option> ";
                                                }
                                            }
                                        ?>
                                        </select>
                                        <br>

                                         <label>Class end</label>
                                        <select name="course_end_time" class="form-control">
                                        <?php $time = array('9AM', '10AM', '11AM', '12PM', '1PM', '2PM' , '3PM', '4PM', '5PM');
                                            foreach ($time as $key) {
                                                if (isset($_POST['course_end_time'])){
                                                    if($key == $_POST['course_end_time']){
                                                        echo "<option value='$key' selected>$key</option> ";
                                                    } else {
                                                        echo "<option value='$key'>$key</option> ";
                                                    }
                                                } else if($key == $result['end_time']) {
                                                        echo "<option value='$key' selected>$key</option> ";
                                                } else {
                                                    echo "<option value='$key'>$key</option> ";
                                                }
                                            }
                                        ?>
                                        </select>
                                        <br>
                                        
                                         <div class="form-group">
                                                    <textarea class="form-control" name="description" rows="3" placeholder="Description"><?php if(isset($_POST['description'])) echo $_POST['description']; else  echo $result['description'];?></textarea>
                                        </div>
                                        <div class="form-group input-group">
                                        <input class="btn  btn-primary btn-block" type="submit" name="edit_course" value="Save Changes">
                                        </div>
                                    
                                    </form>
                                    <?php
if (isset($_POST['edit_course'])) {
   $course_name = $_POST['course_name'];
    $course_prof = $_POST['course_prof'];
    $course_days = isset($_POST['course_days']) ? $_POST['course_days'] : array();
    if (empty($course_days)) {
        echo "Please select a scheduled days";
    }
    $course_start_time = $_POST['course_start_time'];
    $course_end_time = $_POST['course_end_time'];
    $description = $_POST['description'];
    $result = edit_course($result['id'], $course_name, $course_prof, $course_days, $course_start_time, $course_end_time, $description);
    echo "<div style='color:green'>Changes saved !</div>";
} ?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>

