<?php 
include_once 'header.php';
include_once 'admin_menu.php';
?>
   <div id="page-wrapper">
<br>                
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Courses
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
                                            echo "<td><a href='edit_course.php?id=".$course['id']."'><button type='button' class='btn btn-warning'>Edit</button></a></td>";
                                            echo "<td><a href='delete_course.php?id=".$course['id']."'><button type='button' class='btn btn-danger'>Delete</button></a></td>";
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
