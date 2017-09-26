<?php
//NO session maintainence // kavindasilva
/**
 * contains only admin functions. Unauthorized access is not monitored
 * functions: Add new user <- data taken from adduser.php

 /**/
include_once '../php/dbcon2.php';
//include  //header files & css,JS

$newUserType = $_POST['utype'];
$fnm=$_POST['fname'];
$lnm=$_POST['lname'];
$username=$fnm.$lnm; //username eka unique, PK. 
$username=$_POST['prefusern']; //username eka unique, PK. 

$fullName=$fnm." ".$lnm; //Full name. only for emp 
$em=$_POST['eml'];
$adr=$_POST['addr'];
$phn=$_POST['telp']; //supplier phone eka ain karoth meka oni na
//insertUser();


//check if username taken <> flash window eka dammata passe meka oni na
$sql="select * from user where user_name='$username'";
$res=mysqli_query($conn, $sql);
if(mysqli_num_rows($res)>0){
	echo "User name already taken"; //impossible because user name validated
	echo "<hr><a href=\"javascript:history.go(-1)\">GO BACK</a>";
	return;
}
//----------------------------------------------------------------------


$sql="insert into user values('$username', 'skm', '$em', '$adr', '$newUserType')";
if(!mysqli_query($conn, $sql)){
	echo "user insertion error";
	echo mysqli_error($conn);
	return;
}


switch ($newUserType) { //checks the user type to be inserted
	case 'cust' :
		//customer("insert into regular_customer values(null, $phn, );");
		$company=$_POST['comp']; 
		customer($company, $phn, $username);
		break;

	case 'dealer' :
		dealer($phn, $_POST['shopnm'], $username);
		break;

	case 'suppl' :
		supplier($_POST['brnd'], $_POST['cont'], $username);
		break;
			
	case 'salex' :
		salesEx($fullName, $phn, $username);
		break;


	default :
		echo "Wrong user type.... Unexpected error!!";
		break;
}



function customer($comp, $tel, $un) {
	$sqlq="insert into regular_customer values(null, '$comp', $tel, '$un');";
	$res = mysqli_query($GLOBALS['conn'], $sqlq);
	if(!$res){
		echo "error inserting the customer";
		echo mysqli_error($GLOBALS['conn']);
		return;
	}
	echo "<script>alert('Customer insertion succesful');window.location.href = 'index.php';</script>";
	//header("Location: index.php");
}

function supplier($brnd, $coun, $un) {
	$sqlq="insert into supplier values(null, '$brnd', '$coun', '$un');";
	$res = mysqli_query($GLOBALS['conn'], $sqlq);
	if(!$res){
		echo "error inserting the supplier";
		echo mysqli_error($GLOBALS['conn']);
		return;
	}
	echo "<script>alert('Supplier insertion succesful');window.location.href = 'index.php';</script>";
}

function dealer($telp, $shop, $un) {
	$sqlq="insert into dealer values(null, '$shop', '$telp', '$un');"; //check for int <-- telp
	$res = mysqli_query($GLOBALS['conn'], $sqlq);
	if(!$res){
		echo "error inserting the dealer";
		echo mysqli_error($GLOBALS['conn']);
		return;
	}
	echo "<script>alert('Dealer insertion succesful');window.location.href = 'index.php';</script>";
}

function salesEx($fullN, $tel, $un) {
	$sqlq="insert into employee values(null, '$fullN', '$tel', 'salex', '$un');"; //PK auto inc int
	$res = mysqli_query($GLOBALS['conn'], $sqlq);
	if(!$res){
		echo "error inserting the employee";
		echo mysqli_error($GLOBALS['conn']);
		return;
	}
	
	$sqlq="Select max(e_id) as lastemp from employee;"; //last inserted e_id
	$res = mysqli_query($GLOBALS['conn'], $sqlq);
	if(!$res){
		echo "error getting the employee ID";
		echo mysqli_error($GLOBALS['conn']);
		return;
	}
	else{
		if(mysqli_num_rows($res)==0){
			echo "unexpected error. Employee ID not found";
			echo mysqli_error($GLOBALS['conn']);
			return;
		}
		
		$row=mysqli_fetch_array($res); //there is only 1 row, since requesting the max ID
		$empID=$row['lastemp']; //lastemp ID
		
		$sqlq="insert into sales_executive values($empID);";
		$res = mysqli_query($GLOBALS['conn'], $sqlq);
		if(!$res){
			echo "error inserting the sales executive";
			echo mysqli_error($GLOBALS['conn']);
			return;
		}
		echo "<script>alert('Sales Executive insertion succesful');window.location.href = 'index.php';</script>";
	}
	
}


?>