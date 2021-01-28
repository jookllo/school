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
            <h1 class="mt-4">Student Registered</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../admin/index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Student Registered</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Students Registered

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTableAdd" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Subject ID</th>
                                <th>Subject Name</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Subject ID</th>
                                <th>Subject Name</th>
                                <th>Action</th>


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
                                    echo "<td> <button class='btn btn-success' data-toggle='modal' data-target='#editmodal'>Add Attendance</button></td>";
                                    echo "</tr>";

                                }}?>


                                                            </tbody>
                                                        </table>
                        <!-- Modal -->
                        <div id="editmodal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h4 class="modal-title">User Details</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form action="../functions/addattendance.php" method="post">
                                            <div class="form-group">
                                                <label>Student ID:</label>
                                                <input type="text" class="form-control" name="studid" id ="studid" required/></div>
                                            <div class="form-group">
                                                <label>Student Name:</label>
                                                <input type="text" class="form-control" name="sname1" id="sname1" required/></div>
                                            <div class="form-group">
                                                <label>Subject ID:</label>
                                                <input type="text" class="form-control" name="subid" id="subide" required/></div>
                                            <div class="form-group">
                                                <label>Attended:</label>
                                                <select class="form-control" name="attend" id="attend1" required>
                                                    <option value=" "> </option>
                                                    <option value="Present">Present</option>
                                                    <option value="Absent">Absent</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Attend Date:</label>
                                                <input type="date" class="form-control" name="adate" id="adate" required/></div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-success" value="Insert Attendance"  name="addattend" id="Update"/>

                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<script>

    //add event listener to table rows
    let thetable = document.getElementById('dataTableAdd').getElementsByTagName('tbody')[0];
    for (let i = 0; i < thetable.rows.length; i++)
    {
        thetable.rows[i].onclick = function()
        {
            TableRowClick(this);
        };
    }

    function TableRowClick(therow) {
        var studid = therow.cells[0].innerHTML
        var sname = therow.cells[1].innerHTML
        var subid = therow.cells[2].innerHTML
        var attend=therow.cells[3].innerHTML
        var adate =therow.cells[4].innerHTML


        document.getElementById("studid").value = studid;
        document.getElementById("sname1").value = sname;
        document.getElementById("subide").value = subid;
        document.getElementById("attend1").value = attend;
        document.getElementById("adate").value = adate;
    };



</script>
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

