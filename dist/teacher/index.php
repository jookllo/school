<?php
session_start();
$_SESSION['success'] = " <div class='alert alert-success alert-dismissible' role='alert'><a class='close' data-dismiss='alert' aria-label='close'>&times;</a>Welcome Teacher</div>";
if(isset($_SESSION['email'])){
    echo "  ";
}else{
    echo "<script>location.href='../teacher_login.php'</script>";
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>School System</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<?php include 'navbar.php';?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Teachers Portal</h1>
            <?php if(isset($_SESSION['success'])){ echo $_SESSION['success']; }?>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../admin/index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Teachers Portal</li>
            </ol>
<!-- Navbar-->
            <div class="card">
                <div class="card-header">
                    Teacher Profile
                </div>
                <?php
                include "../conn.php";
                $sql = "SELECT * FROM teacher WHERE email = '" . $_SESSION['email'] . "'";
                if($result =mysqli_query($link,$sql)){
                while($row = mysqli_fetch_array($result)){
                ?>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Teacher Name <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <?php echo "<p>". $row['teach_name'] ."</p>";?>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Email <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <?php echo "<p>". $row['email'] ."</p>";?>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">D.O.B. <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <?php echo "<p>". $row['dob'] ."</p>";?>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Subject ID <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <?php echo "<p>". $row['subid'] ."</p>";?>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                   <?php }}?>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="../js/scripts.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
            <script src="../assets/demo/chart-area-demo.js"></script>
            <script src="../assets/demo/chart-bar-demo.js"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
            <script src="../assets/demo/datatables-demo.js"></script>
</body>
</html>

