
<?php
/**
	No session maintainence is done. included with jquery on index.php

	This file contains the following report generation interfaces
	1. Monthly sales details report
	2.

*/

//session maintainence // kavindasilva
/*
session_start();
$_SESSION['user']="Test1";

if(!isset($_SESSION['user'])){
	echo "user not set";
	//header('Location:../login.html');
 }
 elseif ($_SESSION['utype']!="adm") {
     echo "not an admin";
	 //header('Location:../login.html');
 }

/**/
require_once '../../php/dbcon.php';
//include  //header files & css,JS

?>

<script type="text/javascript" src="chiefmgr.js">
	
</script>

Select the report want to generate<br/>

Outstanding report: From <input type="month" id="startm" onclick="checkDate()"> To <input type="month" id="endm" onchange="checkDate()"> <br/>
<input type="text" name="">

<hr/>

<form method="post">
	Monthly sales report<br/>
	Select month: <input type="month" name="" id="rmonth" onchange="checkCur(this.id)"> <br/>
	<input type="submit" name="" id="rmonthbtn" value="OK">
</form>
<hr/>

<?php

//$repType=$_GET['rtype'];
//$sMonth=$_GET['sm']; //start month
//$eMonth=$_GET['em']; //end month
$repType='month';
$sMonth=$_GET['sm']; //start month
$eMonth=$_GET['em']; //end month

$repQuery="select";


if(!isset($_GET['repType'])){ //unauthorized access
	//header("Location: index.php");

	echo "Select report";
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


function outstand(){

}





?>