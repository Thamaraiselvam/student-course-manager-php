<?php 
include_once 'header.php';
?>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Student login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="#" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <?php if (isset($_GET['error'])) { ?>
                                        <div class="form-group" style="color:red">
                                            <?php echo $_GET['error']; ?>
                                        </div>
                                    
                                <?php } ?>
                                    
                          
                                <!-- Change this to a button or input when using this as a form -->
                                <input class="btn btn-lg btn-success btn-block" type="submit" name="student_login" value="Login">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php

if (isset($_POST['student_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = validate_login($email, $password, 'student');
    if ($result !== true) {
        header('Location:student_login.php?error='.urlencode($result));
    }
}