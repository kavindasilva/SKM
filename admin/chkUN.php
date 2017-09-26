<?php

require_once "../php/dbcon.php";
/*
$host = 'localhost';
$user = 'root';
$pass = '';

$con=mysqli_connect($host, $user, $pass, "kss");
*/
//mysql_select_db('demo');

if(isset($_POST['user_name'])){
 $name=$_POST['user_name'];

 $checkdata=" SELECT user_name FROM user WHERE user_name='$name' ";
 //$checkdata=" SELECT indexno FROM sem1r WHERE lname='$name' ";

 $query=mysqli_query($conn, $checkdata);

 if(mysqli_num_rows($query)>0){
  echo "User Name Already Exist";
  echo "<script>resp='xxx';</script>";
  //echo "<script>alert('dsfsd');</script>";
 }
 else{
  echo "OK";
  echo "<script>resp='100';</script>";
 }
 exit();
}



?> 