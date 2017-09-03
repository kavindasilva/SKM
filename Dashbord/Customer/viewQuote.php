<?php
//session maintainence // kavindasilva
session_start();
$_SESSION['user']="Test1";
/**
 if(!isset($_SESSION['user'])){
	echo "user not set";
	//header('Location:../login.html');
 }
 elseif ($_SESSION['utype']!="regcus") {
     echo "not a customer";
	 //header('Location:../login.html');
 }

/**/
require_once '../../php/dbcon2.php';
//include  //header files & css,JS

?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="../../css/mystyle.css">
    <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>

view all

</body>
</html>

<?php

function viewQuote(){
	$sql="select * from quatation where regular_customer_r_id="
	
}

?>