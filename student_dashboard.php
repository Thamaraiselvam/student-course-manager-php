<?php
require 'config.php';
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'student') {
    header('Location:index.php');
};
include_once 'header.php';
include_once 'student_menu.php';
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
                                    <div class="huge">Spring</div>
                                    <div><?php echo get_enrolled_courses_count('spring'); ?> Enrollments</div>
                                </div>
                            </div>
                        </div>
                        <a href="enroll_course.php?sem=spring">
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
                                    <div class="huge">Summer</div>
                                    <div><?php echo get_enrolled_courses_count('summer'); ?> Enrollments</div>
                                </div>
                            </div>
                        </div>
                        <a href="enroll_course.php?sem=summer">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                    <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Fall</div>
                                    <div><?php echo get_enrolled_courses_count('fall'); ?> Enrollments</div>
                                </div>
                            </div>
                        </div>
                        <a href="enroll_course.php?sem=fall">
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