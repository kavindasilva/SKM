<?php
//header
require_once "head.php";
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
<?php
//session maintainence // kavindasilva
/**
 * get method eken user type eka ganna. ekata adalawa fields display karanna
 
 if(!isset($_SESSION['user'])){
	echo "user not set";
	//header('Location:../login.html');
 }
 elseif ($_SESSION['utype']!="adm") {
     echo "not an admin";
	 //header('Location:../login.html');
 }

/**/
//include '../php/dbcon2.php';
//include  //header files & css,JS


if(!isset($_GET['type'])){
	//header("Location: index.php");
}
$newUserType=$_GET['type'];


?>
<script type="text/javascript" src="adminFun.js"></script>

<center>

<form method="post" action="adminfuns1.php">
<table>
	<td><input type='text' name='utype' value="<?php echo $newUserType; ?>" hidden/>
	
	<tr><td>First name</td>	<td><input type="text" name="fname" autocomplete="off" required/></td></tr>
	<tr><td>Last name</td>	<td><input type="text" name="lname" autocomplete="off" required=""/></td></tr>
	<tr><td>Email</td>		<td><input type="email" name="eml" autocomplete="off" required=""/></td></tr>
	<tr><td>Address</td>	<td><textarea name="addr" autocomplete="off"></textarea></td></tr>
	<tr><td>Phone</td>		<td><input type="text" name="telp" autocomplete="off" required=""/></td></tr>
	<tr><td>Prefered username</td><td><input type="text" name="prefuser" autocomplete="off" />
									<button  data-toggle="modal" class="btn btn-default" data-target="#myModal" >Check</button>
									</td></tr>
	<!--sub>danata username eka validate karanne na. ekata UI ekak dala availability check karanna oni</sub-->
	
	<?php
	switch ($newUserType) {
	case 'cust': echo"<title>New customer</title>"; 
		customer();break;
	
	case 'salex': echo"<title>New Sales executive</title>";
		salesEx();break;
	
	case 'dealer': echo"<title>New Dealer</title>";
		dealer();break;
	
	case 'suppl': echo"<title>New Supplier</title>";
		supplier();break;
	case 'ks':
		break;
	
	default:
		break;
}
	?>
	
	
	<tr><td><input type="submit" name="" value="OK" onclick="return confirmI();" /></td>	<td><input type="reset" value="Clear" /></td></tr>
</table>
</form>
</center>

<ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
	
<?php
//footer
require_once "foot.php";
?>

<?php

//in case of redirection
function fillForm($field){ //field == text box name
	if(isset($_GET[$field])){ //
		//header("Location: index.php");
		echo $_GET['$field'];
	}
}
function customer(){
	echo "<tr><td>Company</td>		<td><input type='text' name='comp' autocomplete='off'/></td></tr>";
	echo "<tr><td>User type</td>		<td><input type='text' name='utype0' value='Customer' disabled/>";
	//echo "<td><input type='text' name='utype0' value='Customer' hidden/>"; //for user type
}

function salesEx(){
	//echo "<tr><td>Company</td>	<td><input type='text' name='comp' autocomplete='off'/></td></tr>";
	echo "<tr><td>User type</td>		<td><input type='text' name='utype0' value='Sales Executive' disabled/>";
}

function supplier(){
	echo "<tr><td>Brand</td>		<td><input type='text' name='brnd' autocomplete='on' required/></td></tr>";
	echo "<tr><td>Country</td>		<td><input type='text' name='cont' autocomplete='on' required/></td></tr>";
	echo "<tr><td>User type</td>		<td><input type='text' name='utype0' value='Supplier' disabled/>";
}

function dealer(){
	echo "<tr><td>Shop name</td>		<td><input type='text' name='shopnm' required/>";
	echo "<tr><td>User type</td>		<td><input type='text' name='utype0' value='Dealer' disabled/>";
}

?>