<?php
include 'conn.php';
session_start();
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['pass'];
    //check login details
    $pass=md5($password);

    //echo $stmt->rowCount();
    //exit();
    $s = "select * from teacher where email = '$email' and password = '$pass'";

    $result = mysqli_query($link,$s);

    $num = mysqli_num_rows($result);

    if ($num == 1){
        $_SESSION['email'] = $email;
        header("location: teacher/index.php");
        $_SESSION['success'] = "You are logged in";
    }else{
        header("location: teacher_login.php");
        $_SESSION['error'] = "<div class='alert alert-danger' role='alert'><a class='close' data-dismiss='alert' aria-label='close'>&times;</a>Oh snap! Invalid login details.</div>";


    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>School System</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Teacher Login</h3></div>
                            <div class="card-body">
                                <?php if(isset($_SESSION['error'])){ echo $_SESSION['error']; }?>
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <label class="small mb-1">Username</label>
                                        <input class="form-control py-4" type="email" name="email" required minlength="8" placeholder="Enter Username" />
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputPassword">Password</label>
                                        <input class="form-control py-4" type="password" name="pass" required minlength="8" placeholder="Enter password" />
                                    </div>
                                    <div class="form-group">

                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <input type="submit" class="btn btn-primary btn-block" name="login">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="teacher_login.php">Login as Teacher</a></div>
                                <div class="small"><a href="login.php">Login as Student</a></div>
                                <div class="small"><a href="forgotpass.php">Forgot Password?</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; School System</div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
</body>
</html>
