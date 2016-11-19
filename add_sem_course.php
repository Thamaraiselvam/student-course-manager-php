<?php
require 'config.php';
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
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
                            <div class="table-responsive">
                                <table class="table table-striped">
                                <?php
                                    $enroled_courses = get_all_courses();
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
                                            echo "<tr><td>No Courses found</td></tr>";
                                            die();
                                        }
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
                                            echo "<td><a href='add_sem_course.php?id=".$course['id']."'><button type='button' class='btn btn-danger'>Enroll</button></a></td>";
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


     <div id="page-wrapper">
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
                                <table class="table table-striped">
                                <?php
                                    $Courses = get_all_courses();
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
                                            echo "<tr><td>No Courses found</td></tr>";
                                            die();
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
                                            echo "<td><a href='add_sem_course.php?id=".$course['id']."'><button type='button' class='btn btn-danger'>Enroll</button></a></td>";
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