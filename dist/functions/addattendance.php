<?php
include "../conn.php";
if(isset($_POST['addattend'])){
    $studid = $_POST['studid'];
    $sname = $_POST['sname1'];
    $subid = $_POST['subid'];
    $attend = $_POST['attend'];
    $adate = $_POST['adate'];

    $sql = "INSERT INTO `attendance`(`student_id`, `student_name`, `subid`, `attended`, `attend_date`) VALUES ('$studid','$sname', '$subid','$attend','$adate')";

    if (mysqli_query($link, $sql)) {
        echo "<script> alert('Records Added Successfully')</script>";
        header("Location: ../teacher/students_register.php");
        die();
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        die();
    }
}

?>