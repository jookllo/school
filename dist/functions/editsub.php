<?php

include "../conn.php";

if(isset($_POST['Update'])) {

    $scode = $_POST['scode'];
    $sname = $_POST['sname'];
    $stime = $_POST['stime'];
    $dayavail = $_POST['dayavail'];

    $sql = "UPDATE subject SET subid='$scode', subname='$sname', subtime='$stime', subday = '$dayavail' WHERE subname='$sname'";

    if (mysqli_query($link, $sql)) {
        echo "<script> alert('Records Added Successfully')</script>";
        header("Location: ../admin/index.php");
        die();
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        die();
    }
}elseif(isset($_POST['Delete']))
{
    $sname = $_POST['sname'];

    $sql = "DELETE FROM subject  WHERE subname ='$sname'";

    if (mysqli_query($link, $sql)) {
        echo "<script> alert('Records Added Successfully')</script>";
        header("Location: ../admin/index.php");
        die();
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        die();
    }
}else{
    echo"<script> alert('operation error')</script>";
}

?>