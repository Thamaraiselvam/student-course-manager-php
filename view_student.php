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
                            Student List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                <?php 
                                    $students = get_all_students();
                                ?>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Register Number</th>
                                            <th>Address</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $count =0;   
                                        if (!is_array($students)) {
                                            echo "<tr><td>No students found</td></tr>";
                                            die();
                                        }                                     
                                        foreach ($students as $student ) {
                                            $count++;
                                            echo "<tr>";
                                            echo "<td>".$count."</td>";
                                            foreach ($student as $key => $value ) {
                                                if ($key == 'id') {
                                                    continue;
                                                }
                                                echo "<td>".$value."</td>";
                                            }
                                            echo "<td><a href='edit_student.php?id=".$student['id']."'><button type='button' class='btn btn-warning'>Edit</button></a></td>";
                                            echo "<td><a href='delete_student.php?id=".$student['id']."'><button type='button' class='btn btn-danger'>Delete</button></a></td>";
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