<?php
session_start();
if(isset($_SESSION['email'])){
    echo "  ";
}else{
    echo "<script>location.href='../teacher_login.php'</script>";
}
include "../conn.php";
$output = ' ';
if(isset($_POST['export'])){

    $sql = "select * from student inner join teacher
      on student.subid = teacher.subid INNER JOIN `subject` on subject.subid=teacher.subid where teacher.email ='".$_SESSION['email']."'";
    if($result =mysqli_query($link,$sql)){

      $output.='<table>
     
      <tr>
      <th>Student ID</th>
      <th>Student Name</th>
      <th>Subject ID</th>
      <th>Subject Name</th>
      </tr>     
      ';


      while($row = mysqli_fetch_array($result)){
          $output.='<tr>
          <td>'. $row["student_id"].'</td>
          <td>'. $row["student_name"] .'</td>
          <td>'. $row["subid"] .'</td>
          <td>'. $row["subname"] .'</td>
          </tr>';}
        $output.='</table>';
        header("Content-Type:application/xls");
        header("Content-Disposition:attachment;filename=exportfile.xls");
        echo $output;
        }}

