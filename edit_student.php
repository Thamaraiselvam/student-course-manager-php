<?php 
include_once 'header.php';
include_once 'admin_menu.php';

// if (isset($_GET['id']) && isset($POST['email'])) {
//     header("Location:edit_student.php?id=".$GET['id']);
// } 
if ($_GET['id']) {
    $result = get_student($_GET['id']);
} else {
    die();
}

?>
   <div id="page-wrapper">
                
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Student management
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <h3>Register new student</h3>
                                    <form role="form" method="post" action="#">
                                        <div class="form-group ">
                                            <input type="text" class="form-control" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $result['email'];?>" required="required" name="email" placeholder="email">
                                        </div>
                                         <div class="form-group ">
                                            <input type="text" class="form-control" value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : $result['fullname'];?>"  required="required" name="fullname" placeholder="Fullname">
                                        </div>
<!-- 
                                         <div class="form-group ">
                                            <input type="password" class="form-control"  required="required" name="password" placeholder="Password">
                                        </div> -->
                                         <div class="form-group ">
                                            <input type="text" class="form-control" value="<?php echo isset($_POST['reg_no']) ? $_POST['reg_no'] : $result['reg_no'];?>" required="required" name="reg_no" placeholder="Register Number">
                                        </div>
                                        <div class="form-group">
                                                    <textarea class="form-control" name="address" rows="3" placeholder="Address"><?php if(isset($_POST['address'])) echo $_POST['address']; else  echo $result['address'];?></textarea>
                                        </div>
                                        <div class="form-group ">
                                        <input class="btn  btn-primary btn-block" type="submit" name="edit_student" value="Save Changes">
                                        </div>
                                    
                                    </form>
                                    <?php
if (isset($_POST['edit_student'])) {
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $reg_no = $_POST['reg_no'];
    $address = $_POST['address'];
    $result = edit_student($result['id'], $email, $fullname, $reg_no, $address);
    echo "<div style='color:green'>Changes saved !</div>";
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