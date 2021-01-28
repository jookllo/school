<?php
session_start();

if(isset($_SESSION['uname'])){
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
            <h1 class="mt-4">Administrator Panel</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Teacher</li>
            </ol>

            <div class="card mb-4">

            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Teacher
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTableAdd" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Teacher ID</th>
                                <th>Teacher Name</th>
                                <th>Email</th>
                                <th>Date of Birth</th>
                                <th>Subject ID</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Teacher ID</th>
                                <th>Teacher Name</th>
                                <th>Email</th>
                                <th>Date of Birth</th>
                                <th>Subject ID</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <!-- Trigger the modal with a button -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Register</button>

                                    <!-- Modal -->
                                    <div id="myModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Add Teacher</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post" >
                                                        <div class="form-group">
                                                            <label for="name">Teacher Name:</label>
                                                            <input type="text" class="form-control" minlength="4" id="tname" name="tname" required/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email address:</label>
                                                            <input type="email" minlength="5" class="form-control" id="email" name="email"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dob">Date of Birth:</label>
                                                            <input type="date" class="form-control" id="dob" min="1960-01-01" max="2004-01-01" name="dob"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pwd">Password:</label>
                                                            <input type="password" minlength="6" class="form-control" id="pass" name="pass"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="utype">Subject ID:</label>
                                                            <?php
                                                            include "../conn.php";
                                                            $sql = "select `subid`,`subname` from `subject`";

                                                            echo "<select name='subid' class='form-control' required>";
                                                            echo "<option value=' '></option>";
                                                            if($result =mysqli_query($link,$sql)){
                                                                while($row = mysqli_fetch_array($result)){
                                                                    $subid = $row['subid'];
                                                                    echo "<option value='$subid'>".$row['subname']."</option>"; }}  ?>                                                            </select>
                                                        </div>
                                                        <button type="submit" class="btn btn-success" name="addteacher">Submit</button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>

                                            </div>

                                        </div>
                                    </div><br/>

                                </td>
                            </tr>
                            <?php
                            include "../conn.php";

                            $sql = "Select * from `teacher`";
                            if ($result = mysqli_query($link, $sql)){
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>". $row['teacher_id'] ."</td>";
                                    echo "<td>". $row['teach_name'] ."</td>";
                                    echo "<td>". $row['email'] ."</td>";
                                    echo "<td>". $row['dob'] ."</td>";
                                    echo "<td>". $row['subid'] ."</td>";
                                    echo "<td>";
                                    echo " <button class='btn btn-success' data-toggle='modal' data-target='#editmodal'>Edit</button>";
                                    echo "</td>";
                                    echo "</tr>";
                                }}
                            ?>
                            </tbody>
                        </table>
                        <?php

                        include "../conn.php";

                        if(isset($_POST['addteacher'])) {

                            $tname = $_POST['tname'];
                            $email = $_POST['email'];
                            $dob=$_POST['dob'];
                            $subid = $_POST['subid'];
                            $pwd = $_POST['pass'];

                            $password=md5($pwd);

                            $sql = "INSERT INTO `teacher`( `teach_name`, `email`, `dob`, `password`, `subid`) VALUES ('$tname', '$email','$dob','$password','$subid')";

                            if (mysqli_query($link, $sql)) {
                                echo "<script> alert('Records Added Successfully')</script>";
                                die();
                            } else {
                                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                die();
                            }}?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div id="editmodal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title">User Details</h4>
                    </div>
                    <div class="modal-body">

                        <form action="../functions/editteacher.php" method="post">
                            <div class="form-group">
                                <label>Teacher Name:</label>
                                <input type="text" class="form-control" name="tname" id ="tnames" required/></div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" class="form-control" name="email" id="emaile" required/></div>
                            <div class="form-group">
                                <label>Date of Birth:</label>
                                <input type="date" class="form-control" name="dob" id="dobe" required/></div>
                            <div class="form-group">
                                <label>Subject ID:</label>
                                <?php
                                include "../conn.php";
                                $sql = "select `subid`,`subname` from `subject`";

                                echo "<select name='subid' id='subide' class='form-control' required>";
                                echo "<option value=' '></option>";
                                if($result =mysqli_query($link,$sql)){
                                    while($row = mysqli_fetch_array($result)){
                                        $subid = $row['subid'];
                                        echo "<option value='$subid'>".$row['subname']."</option>"; }}
                                echo "</select>"?> </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Update"  name="Update" id="Update"/>
                                <input type="submit" class="btn btn-danger" value="Delete"  name="Delete" id="Delete"/>
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
        var tname = therow.cells[1].innerHTML
        var email = therow.cells[2].innerHTML
        var dobe = therow.cells[3].innerHTML
        var subide=therow.cells[4].innerHTML


        document.getElementById("tnames").value = tname;
        document.getElementById("emaile").value = email;
        document.getElementById("dobe").value = dobe;
        document.getElementById("subide").value = subide;
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
