<?php
//header
require_once "head.php";
?>

<!-- code for jquery username availability checking -->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript">
var resp="";
function disableBTN(){
    //$("#subk").attr("disabled","disabled");
    $("#subk").prop('disabled', true);
}
function enableBTN(){
    //$("#subk").removeAttr("disabled");
    $("#subk").prop('disabled', false);
}

function checknamek(){
 var namek=document.getElementById( "prefuser" ).value;
	
 if(namek)
 {
  $.ajax({
  type: 'post',
  url: 'chkUN.php',
  data: {
   user_name:namek,
  },
  success: function (responsek) {
   $( '#name_statusun' ).html(responsek);
  // if(responsek=="OK")	
   if(resp=="100")	
   {
	   //alert("DD");
    enableBTN();
	return true;
	
   }
   else
   {
	  // alert(responsek);
	   //alert(resp);
    disableBTN();
    return false;	
   }
  }
  });
 }
 else
 {
  $( '#name_statusun' ).html("");
  enableBTN();
  return false;
 }
}
</script>

    <!-- Content Header (Page header) -->
    <section class="content-header">
<?php
//session maintainence // kavindasilva
/**
 * get method eken user type eka ganna. ekata adalawa fields display karanna
/* 
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
<script type="text/javascript" src="adminValidate.js"></script>

<center>

<div class="form-group">
<form method="post" action="adminfuns1.php">
<table>
	<td><input type='text' name='utype' value="<?php echo $newUserType; ?>" hidden/>
	
	<tr><td>First name</td>	<td><input type="text" name="fname" class="form-control" autocomplete="off" required/></td></tr>
	<tr><td>Last name</td>	<td><input type="text" name="lname" class="form-control" autocomplete="off" required/></td></tr>
	<tr><td>Email</td>		<td><input type="email" name="eml" class="form-control" autocomplete="off" required/></td></tr>
	<tr><td>Address</td>	<td><textarea name="addr" class="form-control" autocomplete="off"></textarea></td></tr>
	<tr><td>Phone</td>		<td><input type="text" name="telp" id="telp" autocomplete="off" class="form-control" onkeyup="validateTel()" required/></td></tr>
	<tr><td>Prefered username</td><td><input type="text" name="prefusern" id="prefuser" class="form-control" onkeyup="checknamek();"  /><span id="name_statusun"><sup>Enter a user name</sup></span>
	</td></tr>

	
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
	
	
	<tr><td><input type="submit" class="form-control" name="submit_form" id="subk" value="OK" onclick="return validateTel();return confirmI();" /></td>	<td><input type="reset" value="Clear" class="form-control" /></td></tr>
</table>
</form>
</div>
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
	echo "<tr><td>Company</td>		<td><input type='text' class='form-control' name='comp' autocomplete='off'/></td></tr>";
	echo "<tr><td>User type</td>		<td><input type='text' class='form-control' name='utype0' value='Customer' disabled/>";
	//echo "<td><input type='text' name='utype0' value='Customer' hidden/>"; //for user type
}

function salesEx(){
	//echo "<tr><td>Company</td>	<td><input type='text' name='comp' autocomplete='off'/></td></tr>";
	echo "<tr><td>User type</td>		<td><input type='text' class='form-control' name='utype0' value='Sales Executive' disabled/>";
}

function supplier(){
	echo "<tr><td>Brand</td>		<td><input type='text' class='form-control' name='brnd' autocomplete='on' required/></td></tr>";
	echo "<tr><td>Country</td>		<td><input type='text' class='form-control' name='cont' autocomplete='on' required/></td></tr>";
	echo "<tr><td>User type</td>		<td><input type='text' class='form-control' name='utype0' value='Supplier' disabled/>";
}

function dealer(){
	echo "<tr><td>Shop name</td>		<td><input type='text' class='form-control' name='shopnm' required/>";
	echo "<tr><td>User type</td>		<td><input type='text' class='form-control' name='utype0' value='Dealer' disabled/>";
}

?>