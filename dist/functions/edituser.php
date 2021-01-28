<?php

include "../conn.php";

if(isset($_POST['Update'])) {

    $sname = $_POST['sname'];
    $email = $_POST['email'];
    $dob=$_POST['dob'];
    $subid = $_POST['subid'];

    $sql = "UPDATE student SET student_name='$sname', email='$email', dob='$dob', subid = '$subid' WHERE email='$email'";

    if (mysqli_query($link, $sql)) {
        echo "<script> alert('Records Added Successfully')</script>";
        header("Location: ../admin/student.php");
        die();
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        die();
    }
}elseif(isset($_POST['Delete']))
{
    $email = $_POST['email'];

    $sql = "DELETE FROM student  WHERE email='$email'";

    if (mysqli_query($link, $sql)) {
        echo "<script> alert('Records Added Successfully')</script>";
        header("Location: ../admin/student.php");
        die();
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        die();
    }
}else{
    echo"<script> alert('operation error')</script>";
}




?>