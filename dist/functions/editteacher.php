<?php

include "../conn.php";

if(isset($_POST['Update'])) {

    $tname = $_POST['tname'];
    $email = $_POST['email'];
    $dob=$_POST['dob'];
    $subid = $_POST['subid'];

    $sql = "UPDATE teacher SET teach_name='$tname', email='$email', dob='$dob', subid = '$subid' WHERE email='$email'";

    if (mysqli_query($link, $sql)) {
        echo "<script> alert('Records Added Successfully')</script>";
        header("Location: ../admin/teacher.php");
        die();
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        die();
    }
}elseif(isset($_POST['Delete']))
{
    $email = $_POST['email'];

    $sql = "DELETE FROM teacher  WHERE email='$email'";

    if (mysqli_query($link, $sql)) {
        echo "<script> alert('Records Added Successfully')</script>";
        header("Location: ../admin/teacher.php");
        die();
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        die();
    }
}else{
    echo"<script> alert('operation error')</script>";
}
?>