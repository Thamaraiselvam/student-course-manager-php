<?php
require 'config.php';
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header('Location:index.php');
};

include_once 'header.php';
include_once 'admin_menu.php';
// var_dump($_SESSION);
?>
        <div id="page-wrapper">
                <div class="col-lg-12">
                    <h1 class="page-header">Hi <?php echo $_SESSION['user_fullname'];?> ,</h1>
                </div><div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Students</div>
                                    <div><?php echo get_students_count(); ?> Registered</div>
                                </div>
                            </div>
                        </div>
                        <a href="view_student.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                    <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Courses</div>
                                    <div><?php echo get_courses_count(); ?> Available</div>
                                </div>
                            </div>
                        </div>
                        <a href="view_course.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- /.col-lg-12 -->
        </div>
        <!-- /#page-wrapper -->

    </div>


<?php
include_once 'footer.php';
?>