<?php
require 'config.php';
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'student') {
    header('Location:index.php');
};
include_once 'header.php';
include_once 'student_menu.php';
?>
  <div id="page-wrapper" style="min-height: auto !important">
<br>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Enrolled courses for <?php echo $_GET['sem']; ?> Semester
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <span id="sem_type" sem_type="<?php  echo $_GET['sem'];  ?>" style="display: none" ></span>
                        <span id="user_id" user_id="<?php  echo $_SESSION['user_id'];  ?>" style="display: none" ></span>
                            <div class="table-responsive">
                                <table class="table table-striped" id="enrolled_courses_table">
                                <?php
                                    $enroled_courses = get_all_enrolled_courses($_GET['sem']);
                                ?>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Professor </th>
                                            <th>Course Days</th>
                                            <th>Start time</th>
                                            <th>End Time</th>
                                            <th>Description</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $count =0;
                                        if (!is_array($enroled_courses)) {
                                            echo "<tr class='no_enroll_course'><td>No courses enrolled</td></tr>";
                                            // die();
                                        } else {
                                            foreach ($enroled_courses as $course ) {
                                                $count++;
                                                echo "<tr>";
                                                echo "<td>".$count."</td>";
                                                foreach ($course as $key => $value ) {
                                                    if ($key == 'id') {
                                                        continue;
                                                    }
                                                    if ($key == 'days') {
                                                        $str = '';
                                                        $days = unserialize($value);
                                                        if (!is_array($days)) {
                                                            continue;
                                                        }
                                                        foreach ($days as $day) {
                                                            if (empty($str)) {
                                                                $str .= $day.', ';
                                                            } else{
                                                                $str .= ', '.$day;
                                                            }
                                                        }
                                                        echo "<td>".$str."</td>";
                                                        continue;
                                                    }
                                                    echo "<td>".$value."</td>";
                                                }
                                                  echo "<td><button id='disenroll' course_id=".$course['id']." type='button' class='btn btn-danger disenroll'>Disenroll</button></td>";
                                                echo "</tr>";
                                            }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>


     <div id="page-wrapper">
     <span id="success_course_message" style="color: green"></span>
     <span id="failed_course_message" style="color: red"></span>
<br>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Enroll new courses to <?php echo $_GET['sem']; ?> Semester
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="enroll_courses_table">
                                <?php
                                    $Courses = get_all_unenrolled_courses($_GET['sem']);
                                ?>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Professor </th>
                                            <th>Course Days</th>
                                            <th>Start time</th>
                                            <th>End Time</th>
                                            <th>Description</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $count =0;
                                        if (!is_array($Courses)) {
                                            echo "<tr class='no_course'><td>No Courses found</td></tr>";
                                            // die();
                                        }
                                        foreach ($Courses as $course ) {
                                            $count++;
                                            echo "<tr>";
                                            echo "<td>".$count."</td>";
                                            foreach ($course as $key => $value ) {
                                                if ($key == 'id') {
                                                    continue;
                                                }
                                                if ($key == 'days') {
                                                    $str = '';
                                                    $days = unserialize($value);
                                                    if (!is_array($days)) {
                                                        continue;
                                                    }
                                                    foreach ($days as $day) {
                                                        if (empty($str)) {
                                                            $str .= $day.', ';
                                                        } else{
                                                            $str .= ', '.$day;
                                                        }
                                                    }
                                                    echo "<td>".$str."</td>";
                                                    continue;
                                                }
                                                echo "<td>".$value."</td>";
                                            }
                                            echo "<td><button id='course_id' course_id=".$course['id']." type='button' class='btn btn-danger enroll_course'>Enroll</button></td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>

<?php
include_once 'footer.php';
?>