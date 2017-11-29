<?php
/**
	change password UI
*/

//header
require_once "head.php";
?>

<section class="content-header">
   <script type="text/javascript" src="adminFun.js"></script>
	<B>admin control panel</b> <br/>
	You are about to change your login password<br/>
<div class="">

	<table>
	<form action="../php/changepass.php" method="post" onsubmit="return chkPass();">
		<tr> <td>Old password</td>
		<td><input type="password" name="oldpass"/></td></tr>
		
		<tr> <td>New password</td>
		<td><input type="password" name="newpass" id="pass1"/></td></tr>
		
		<tr> <td>Confrim new password</td>
		<td><input type="password" name="newpass2" id="pass2"/></td></tr>
		
		<tr> 
		<td><input type="submit" name="sub1" value="OK" /></td>
		<td><a href="index.php"><input type="button" name="res" value="cancel"/></a></td></tr>
		
	</form>
	</table>
	

</div>

    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<?php
//footer
require_once "foot.php";
?>