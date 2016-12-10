<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="student_dashboard.php">Welcome <?php echo $_SESSION['user_fullname'];?></a>
            </div>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="student_dashboard.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Semesters<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="">
                                    <a href="#">Spring<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level collapse" aria-expanded="false">
                                        <li>
                                            <a href="view_schedule.php?sem=spring">View Schedule</a>
                                        </li>
                                        <li>
                                            <a href="enroll_course.php?sem=spring">Enroll course</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>

                                 <li class="">
                                    <a href="#">Summer<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level collapse" aria-expanded="false" >
                                        <li>
                                            <a href="view_schedule.php?sem=summer">View Schedule</a>
                                        </li>
                                        <li>
                                            <a href="enroll_course.php?sem=summer">Enroll course</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>

                                 <li class="">
                                    <a href="#">Fall<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level collapse" aria-expanded="false" >
                                        <li>
                                            <a href="view_schedule.php?sem=fall">View Schedule</a>
                                        </li>
                                        <li>
                                            <a href="enroll_course.php?sem=fall">Enroll course</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                               <!--  <li>
                                    <a href="edit_student.php">Edit</a>
                                </li> -->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="student_profile.php"><i class="fa fa-logout fa-fw"></i> Profile</a>
                        </li>
                        <li>
                            <a href="logout.php"><i class="fa fa-logout fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
</div >
<?php 
include_once 'footer.php';
?>
