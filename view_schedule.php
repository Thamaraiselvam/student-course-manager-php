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
                            Schedule for <?php echo $_GET['sem']; ?> Semester
                        </div>
                        <!-- /.panel-heading -->
                         <?php
                                    $enroled_courses_schedule = get_all_enrolled_schedule($_GET['sem']);
                                    if (empty($enroled_courses_schedule)) {
                                        die('No courses enrolled');
                                    }
                                ?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Week Days</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Monday</td>
                                            <td><?php echo $enroled_courses_schedule['Monday'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Tuesday</td>
                                            <td><?php echo $enroled_courses_schedule['Tuesday'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Wednesday</td>
                                            <td><?php echo $enroled_courses_schedule['Wednesday'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Thursday</td>
                                            <td><?php echo $enroled_courses_schedule['Thursday'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Friday</td>
                                            <td><?php echo $enroled_courses_schedule['Friday'];?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                       </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>

<?php
include_once 'footer.php';
?>