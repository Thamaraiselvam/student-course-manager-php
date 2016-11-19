<?php
require 'config.php';
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header('Location:index.php');
};
include_once 'admin_menu.php';
include_once 'header.php';
?>
   <div id="page-wrapper">

            <!-- /.row -->
            <div class="row">
            <br>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Course Management
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <h3>Add new course</h3>
                                    <form role="form" method="post" action="#">
                                        <div class="form-group ">
                                            <input type="text" class="form-control" required="required" name="course_name" placeholder="Course Name">
                                        </div>
                                         <div class="form-group">
                                            <input type="text" class="form-control" required="required" name="course_prof" placeholder="Professor Name">
                                        </div>

                                        <div class="form-group">
                                            <label>Course day</label><br>
                                            <label class="checkbox-inline">
                                                <input name="course_days[]"  value="Monday"   type="checkbox">Monday
                                            </label>
                                            <label class="checkbox-inline">
                                                <input name="course_days[]"  type="checkbox" value="Tuesday">Tuesday
                                            </label>
                                            <label class="checkbox-inline">
                                                <input name="course_days[]"  type="checkbox" value="Wednesday">Wednesday
                                            </label>
                                            <label class="checkbox-inline">
                                                <input name="course_days[]"  type="checkbox" value="Thursday">Thursday
                                            </label>
                                            <label class="checkbox-inline">
                                                <input name="course_days[]"  type="checkbox" value="Friday">Friday
                                            </label>
                                        </div>
                                        <label>Class start</label>
                                        <select name="course_start_time" class="form-control">
                                                 <option value="9AM">9AM</option>
                                                <option value="10AM">10AM</option>
                                                <option value="11AM">11AM</option>
                                                <option value="12PM">12PM</option>
                                                <option value="01PM">01PM</option>
                                                <option value="02PM">02PM</option>
                                                <option value="03PM">03PM</option>
                                                <option value="04PM">04AM</option>
                                                <option value="05PM">05PM</option>
                                        </select>
                                        <br>
                                        <label>Class end</label>
                                        <select name="course_end_time" class="form-control">
                                                <option value="9AM">9AM</option>
                                                <option value="10AM">10AM</option>
                                                <option value="11AM">11AM</option>
                                                <option value="12PM">12PM</option>
                                                <option value="01PM">01PM</option>
                                                <option value="02PM">02PM</option>
                                                <option value="03PM">03PM</option>
                                                <option value="04PM">04AM</option>
                                                <option value="05PM">05PM</option>
                                        </select>
                                        <br>
                                        <label>Course  Description</label>
                                         <div class="form-group">
                                                    <textarea class="form-control" name="description" rows="3" placeholder="Description"></textarea>
                                        </div>
                                        <div class="form-group">
                                        <input class="btn  btn-primary btn-block" type="submit" name="add_course" value="Add ">
                                        </div>

                                    </form>
                                    <?php
if (isset($_POST['add_course'])) {
    $course_name = $_POST['course_name'];
    $course_prof = $_POST['course_prof'];
    $course_days = isset($_POST['course_days']) ? $_POST['course_days'] : array();
    if (empty($course_days)) {
        echo "Please select a scheduled days";
    }
    $course_start_time = $_POST['course_start_time'];
    $course_end_time = $_POST['course_end_time'];
    $description = $_POST['description'];
    $result = add_new_course($course_name, $course_prof, $course_days, $course_start_time, $course_end_time, $description);
    // if ($result !== true) {
    //     header('Location:add_new_student.php?error='.urlencode($result));
    // }
    echo "<div style='color:green'>New Course added !</div>";
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

<?php
include_once 'footer.php';
?>