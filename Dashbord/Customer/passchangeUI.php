<?php
/**
	change password UI
*/

//header
//require_once "head.php";
?>

<script type="text/javascript">
	/*function chkPass(){
		var p1 = document.getElementById("pass1").value;
		var p2 = document.getElementById("pass2").value;
	
		if(p1==p2){
			return true;
		}
		else{
			alert("password confirmation failed. Try again");
			return false;
		}
	}*/
</script>

<!--section class="content-header"-->
   <script type="text/javascript" src="chiefmgr.js"></script>
	<B>Chief manager</b> <br/>
	You are about to change your login password<br/>
<div class="">

	<table>
	<!--form action="../php/changepass.php" method="post" onsubmit="return chkPass();"-->
		<tr> <td>Old password</td>
		<td><input type="password" id="oldpass" name="oldpass"/></td></tr>
		
		<tr> <td>New password</td>
		<td><input type="password" id="newpass" name="newpass" id="pass1" /></td></tr>
		
		<tr> <td>Confirm new password</td>
		<td><input type="password" name="newpass2" id="newpass2"  /></td></tr>
		
		<tr> 
		<td><input type="button" name="sub1" id="sub1" value="OK" onclick="" /></td>
		<td><a href="index.php"><input type="button" name="res" value="cancel"/></a></td></tr>
		
	<!--form-->
	</table>
	

</div>

    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
<!--/section-->

<script>
$('#sub1').click(function(){
	//function chkPass(){
	var oldp=document.getElementById("oldpass").value;
	var p1 = document.getElementById("newpass").value;
	var p2 = document.getElementById("newpass2").value;
	
	if(p1==p2){
		//return true;
		//var oldpass1=$('#oldpass').val();
		//var newpass1=$('#newpass').val();
		$.ajax({//pass parameters to other file
			type:"post",
			data:{oldpass:oldp, newpass:p1},
			url:"../../php/changepass.php",
			success:function(data){
				alert(data);
				$('#content-wrapper').load('dashbord.php');
			}
		});
	}
	else{
		alert("New password confirmation failed. Try again");
		return false;
	}
	
	
	
	});
</script>


<?php
//footer
//require_once "foot.php";
?>