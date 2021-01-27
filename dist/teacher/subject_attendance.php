<?php
session_start();
$_SESSION['success'] = " <div class='alert alert-success alert-dismissible' role='alert'><a class='close' data-dismiss='alert' aria-label='close'>&times;</a>Welcome Teacher</div>";
if(isset($_SESSION['email'])){
    echo "  ";
}else{
    echo "<script>location.href='../teacher_login.php'</script>";
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
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<?php include 'navbar.php';?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Reports</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../admin/index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Reports</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">

                    <i class="fas fa-table mr-1"></i>
                    Students Registered
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" style="float: right" data-target="#exampleModal">
                        Add Attendance
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" cellspacing="0">

                            <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Subject ID</th>
                                <th>Subject Name</th>
                                <th>Attendance Status</th>
                                <th>Attendance Date</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Subject ID</th>
                                <th>Subject Name</th>
                                <th>Attendance Status</th>
                                <th>Attendance Date</th>

                            </tr>
                            </tfoot>
                            <tbody>

                            <?php include '../conn.php';
                            $sql = "select * from student inner join teacher
                             on student.subid = teacher.subid INNER JOIN `subject` on subject.subid=teacher.subid where teacher.email ='".$_SESSION['email']."'";
                            if($result =mysqli_query($link,$sql)){
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>". $row['student_id']."</td>";
                                    echo "<td>". $row['student_name'] ."</td>";
                                    echo "<td>". $row['subid'] ."</td>";
                                    echo "<td>". $row['subname'] ."</td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "</tr>";

                                }}?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade "  id="exampleModal" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Attendance Student</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Attendance Date: <input class="form-control-sm" type="date"/></p>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Student ID</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Subject ID </th>
                                    <th scope="col">Attendance</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php include '../conn.php';
                                $sql = "select * from student inner join teacher
                             on student.subid = teacher.subid INNER JOIN `subject` on subject.subid=teacher.subid where teacher.email ='".$_SESSION['email']."'";
                                if($result =mysqli_query($link,$sql)){

                                    while($row = mysqli_fetch_array($result)){

                                        echo "<tr>";
                                        echo "<td value>". $row['student_id']."</td>";
                                        echo "<td>". $row['student_name'] ."</td>";
                                        echo "<td>". $row['subid'] ."</td>";

                                        echo "<td>
                                            <select name='attendance' class='form-control' required>
                                                <option value='Present'>Present</option>
                                               <option value='Absent'>Absent</option>                     
                                            </select></td>";
                                        echo "<td></td>";
                                        echo "</tr>";

                                    }}
                                if(isset($_POST['addattendance'])){

                                }
                                ?>

                                </tbody>
                            </table>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" name="">Save changes</button>
                        </div>
                    </div>
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

