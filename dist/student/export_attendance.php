<?php
session_start();
if(isset($_SESSION['email'])){
    echo "  ";
}else{
    echo "<script>location.href='../login.php'</script>";
}
include "../conn.php";
$output = ' ';
if(isset($_POST['export'])){

    $sql = "select * from attendance inner join student on attendance.student_id = student.student_id where student.email = '".$_SESSION['email']."'";
    if($result =mysqli_query($link,$sql)){

      $output.='<table>
     
      <tr>
      <th>Subject Code</th>
      <th>Date of Attending</th>
      <th>Student Name</th>
      <th>Attended</th>
      </tr>     
      ';


      while($row = mysqli_fetch_array($result)){
          $output.='<tr>
          <td>'. $row['subid'].'</td>
          <td>'. $row['attend_date'] .'</td>
          <td>'. $row['student_name'] .'</td>
          <td>'. $row['attended'] .'</td>
          </tr>';}
        $output.='</table>';
        header("Content-Type:application/xls");
        header("Content-Disposition:attachment;filename=studentattendance.xls");
        echo $output;
        }}

