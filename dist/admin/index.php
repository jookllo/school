<?php
session_start();
$_SESSION['success'] = " <div class='alert alert-success alert-dismissible' role='alert'><a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
 <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>Welcome Administrator</div>";
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
                       <li class="breadcrumb-item active">Tables</li>
                   </ol>

                       <?php if(isset($_SESSION['success'])){ echo $_SESSION['success']; }?>


                   <div class="card mb-4">
                       <div class="card-header">
                           <i class="fas fa-table mr-1"></i>
                           Subjects
                       </div>
                       <div class="card-body">
                           <div class="table-responsive">
                               <table class="table table-bordered" id="dataTable" cellspacing="0">
                                   <thead>
                                   <tr>
                                       <th>Subject Code</th>
                                       <th>Subject Name</th>
                                       <th>Time Offered</th>
                                       <th>Day Available</th>
                                       <th>Action</th>
                                   </tr>
                                   </thead>
                                   <tfoot>
                                   <tr>
                                       <th>Subject Code</th>
                                       <th>Subject Name</th>
                                       <th>Time Offered</th>
                                       <th>Day Available</th>
                                       <th>Action</th>
                                   </tr>
                                   </tfoot>
                                   <tbody>
                                   <tr>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td>
                                           <!-- Trigger the modal with a button -->
                                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Register</button>

                                           <!-- Modal -->
                                           <div id="myModal1" class="modal fade" role="dialog">
                                               <div class="modal-dialog">

                                                   <!-- Modal content-->
                                                   <div class="modal-content">
                                                       <div class="modal-header">
                                                           <h4 class="modal-title">Add Subject</h4>
                                                           <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                       </div>
                                                       <div class="modal-body">
                                                          <form action="" method="post">
                                                                  <div class="form-group">
                                                                      <label for="scode">Subject Code:</label>
                                                                      <input type="text" class="form-control" id="scode" name="scode" required/>
                                                                  </div>
                                                                  <div class="form-group">
                                                                      <label for="sname">Subject Name:</label>
                                                                      <input type="text" class="form-control" id="sname" name="sname" required/>
                                                                  </div>
                                                                   <div class="form-group">
                                                                       <label for="subtime">Time:</label>
                                                                       <input type="time" class="form-control" id="stime" name="stime"/>
                                                                   </div>
                                                                   <div class="form-group">
                                                                       <label for="Day">Day Available:</label>
                                                                       <select name="dayavail" required class="form-control">
                                                                           <option value=" "> </option>
                                                                           <option value="Monday">Monday</option>
                                                                           <option value="Tuesday">Tuesday</option>
                                                                           <option value="Wednesday">Wednesday</option>
                                                                           <option value="Thursday">Thursday</option>
                                                                           <option value="Friday">Friday</option>
                                                                           <option value="Saturday">Saturday</option>
                                                                       </select>
                                                                   </div>
                                                                   <button type="submit" class="btn btn-success" name="addsubject">Submit</button>
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

                                   $sql = "Select * from `subject`";
                                   if ($result = mysqli_query($link, $sql)){
                                   while($row = mysqli_fetch_array($result)){
                                       echo "<tr>";
                                       echo "<td>". $row['subid'] ."</td>";
                                       echo "<td>". $row['subname'] ."</td>";
                                       echo "<td>". $row['subtime'] ."</td>";
                                       echo "<td>". $row['subday'] ."</td>";
                                       echo "<td>";
                                       echo " <button class='btn btn-success' href='report.php'>Edit</button>";
                                       echo " <a class='btn btn-danger' href='../functions/deleteuser.php?id=echo ".$row['id'].";'>Delete</a>";
                                       echo "</td>";
                                       echo "</tr>";
                                   }}
                                   ?>
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
              <?php

                    if(isset($_POST['addsubject'])){
                        $scode = $_POST['scode'];
                        $sname = $_POST['sname'];
                        $stime = $_POST['stime'];
                        $dayavail = $_POST['dayavail'];

                        $sql = "INSERT INTO `subject`(`subid`, `subname`, `subtime`, `subday`) VALUES ('$scode','$sname', '$stime','$dayavail')";

                        if (mysqli_query($link, $sql)) {
                            echo "<script> alert('Records Added Successfully')</script>";

                            die();
                        } else {
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                            die();
                        }
                    }

               ?>
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
