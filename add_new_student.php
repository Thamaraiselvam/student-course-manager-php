<?php
require 'config.php';
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header('Location:index.php');
};
include_once 'header.php';
include_once 'admin_menu.php';
?>
   <div id="page-wrapper">
                
            <!-- /.row -->
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Revamped PAWS
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              <br>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <h4>Register new student</h4>
                                    <form role="form" method="post" action="#">
                                        <div class="form-group ">
                                            <input type="text" class="form-control" required="required" name="email" placeholder="email">
                                        </div>
                                         <div class="form-group ">
                                            <input type="text" class="form-control" required="required" name="fullname" placeholder="Fullname">
                                        </div>

                                         <div class="form-group ">
                                            <input type="password" class="form-control" required="required" name="password" placeholder="Password">
                                        </div>
                                         <div class="form-group ">
                                            <input type="text" class="form-control" required="required" name="reg_no" placeholder="Register Number">
                                        </div>
                                         <div class="form-group">
                                                    <textarea class="form-control" name="address" rows="3" placeholder="Address"></textarea>
                                        </div>
                                        <div class="form-group ">
                                        <input class="btn  btn-primary btn-block" type="submit" name="add_student" value="Add">
                                        </div>
                                    
                                    </form>
                                    <?php
if (isset($_POST['add_student'])) {
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    $reg_no = $_POST['reg_no'];
    $address = $_POST['address'];
    $result = add_new_student($email, $fullname, $password, $reg_no, $address);
    if ($result !== true) {
        header('Location:add_new_student.php?error='.urlencode($result));
    }
    echo "New Student created !";
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