<?php
session_start();
if(isset($_SESSION['email'])){
    echo "  ";
}else{
    echo "<script>location.href='login.php'</script>";
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
<!-- Navbar-->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Attendance</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../admin/index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Attendance</li>
            </ol>
            <div class="card mb-4">

            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Subject Attendance
                    <form method="post" action="export_attendance.php">
                        <input type="submit" class="btn btn-success" value="Export to Excel" style="float: right;" name="export">
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Subject Code</th>
                                <th>Date</th>
                                <th>Time Offered</th>
                                <th>Attended</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Subject Code</th>
                                <th>Date</th>
                                <th>Time Offered</th>
                                <th>Attended</th>
                            </tr>
                            </tfoot>
                            <tbody>
                             <?php include '../conn.php';
                            $sql = "select * from attendance inner join student on attendance.student_id = student.student_id where student.email = '".$_SESSION['email']."'";
                             if($result =mysqli_query($link,$sql)){
                                 while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>".$row['subid']."</td>";
                            echo "<td>".$row['attend_date']."</td>";
                            echo "<td>".$row['student_name']."</td>";
                            echo "<td>".$row['attended']."</td>";
                            echo "</tr>";}}?>
                            </tbody>
                        </table>
                    </div>
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

