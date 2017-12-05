
<?php
/**
	This file contains the following report generation interfaces
	1. Monthly sales details report
	2.

*/

//session maintainence // kavindasilva
session_start();
$_SESSION['user']="Test1";
/**
 if(!isset($_SESSION['user'])){
	echo "user not set";
	//header('Location:../login.html');
 }
 elseif ($_SESSION['utype']!="adm") {
     echo "not an admin";
	 //header('Location:../login.html');
 }

/**/
include_once '../../php/dbcon2.php';
//include  //header files & css,JS

?>


<?php

//$repType=$_GET['rtype'];
//$sMonth=$_GET['sm']; //start month
//$eMonth=$_GET['em']; //end month
$repType='month';
$sMonth=$_GET['sm']; //start month
$eMonth=$_GET['em']; //end month

$repQuery="select";


if(!isset($_GET['repType'])){ //unauthorized access
	header("Location: index.php");
}

$rType=$_GET['repType'];
switch($rType){
	case 'thismonth': 
		;break;
	
	case 'salex': 
		;break;
	
	case 'dealer': 
		;break;
	
	case 'suppl': 
		;break;
	case 'ks':
		break;
	
	default:
		break;
}





?>