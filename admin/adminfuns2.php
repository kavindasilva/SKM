<?php
//NO session maintainence // kavindasilva
/**
 * contains only admin functions. Unauthorized access is not monitored
 * functions: edit users

 /**/
include_once '../php/dbcon2.php';
//include  //header files & css,JS

$newUserType = $_POST['utype'];
$fnm=$_POST['fname'];
$lnm=$_POST['lname'];
$username=$fnm.$lnm; //username eka unique, PK. 

$em=$_POST['eml'];
$adr=$_POST['addr'];
$phn=$_POST['telp']; //supplier phone eka ain karoth meka oni na
//insertUser();

//check if username taken <> flash window eka dammata passe meka oni na
$sql="select * from user where user_name='$username'";
$res=mysqli_query($conn, $sql);
if(mysqli_num_rows($res)>0){
	echo "User name already taken"; //JS aler passe damu
	echo "<hr><a href=\"javascript:history.go(-1)\">GO BACK</a>";
	return;
}

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

	case 'salex' :
		salesEx();
		break;

	case 'dealer' :
		dealer();
		break;

	case 'suppl' :
		supplier($_POST['brnd'], $_POST['cont'], $username);
		break;
	case 'ks' :
		break;

	default :
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

function salesEx() {
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

function dealer() {
}
?>