<?php
require_once("conn.php");
session_start();


$name = $_POST['uname'];
$pass1 = $_POST['pass_1'];
$email = $_POST['email'];
$pass2 = $_POST['pass_2'];

$s = "select uname, email from users where uname = '$name' and email = '$email' ";

$result = mysqli_query($link,$s);

$num = mysqli_num_rows($result);
if($pass1 != $pass2){  
  echo "Error boi. Passwords don't match.";
  exit();
}
if ($num >= 1){
  header("location:login.php");
}else{
  $hashpass = md5($pass1);
  $reg = "insert into users(uname,email,pass) values ('$name','$email','$hashpass')";
  mysqli_query($link,$reg);
  echo "Registration Successful";
  header("location:login.php");
}
