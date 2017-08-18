<?php 
//session maintainence
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Admin interface</title>
		<link rel="stylesheet" type="text/css" href="./css/pageBody.css" />
		<link rel="stylesheet" type="text/css" href="./css/dropdown.css"/>

	</head>
	<body>

		<div id="topp">
			<center>
				This is top
				
			</center>
		</div>
		<!--end of the top divisor-->

		<div id="bottom">
			<!--start of the left pane-->
			<div id="leftd" >
				<P>
					bottom left blah dhjf eklgfd ikfgsd welihfgwedf  wrelgfn ljnsfg kjndfg dsrlng edsrloikngs
				</P>
			</div>
			<!--end of the left pane-->

			<!--start of the main pane-->
			<div id="rightd" >
				<P>
					Bottom right word1 word2 word 3 sdkljn slngsd olhnjwsdfg jlojhnswgf lnhsgd word6 word7 word8
					skjhf khhb kjhbk klhbkj jhgfch jkhb kiojhb kjhbn lnh lkjnhh ljn klbn lopnhl kloblopn lnjhl;pn kn
				</P>
				
				<center>
				Change your password
				<form name="login" action="user.php" method="post">
					<table>
						<tr><td>Email: </td><td colspan="2" ><input type="text" name="email" size="30" required/></td></tr>
						<tr><td>password: </td><td colspan="2"><input type="text" name="pass" size="30" required/></td></tr>
						<tr><td></td><td><input type="submit" value="OK" name="log"/><input type="reset" value="clear" /></td></tr>
					</table>
				</form>
				<br>
				
				<a href="./adduser.php"><input type=button value='add new user'></a><br>

				</center>
							
			</div>
			<!--end of the main page-->
		</div>

		<!--start of the footer-->
		<div id="foot" style="">
			<center class="footfix">
				&copy;KS <a href="http://ugvle.ucsc.cmb.ac.lk">visit us</a>
			</center>
		</div>
		<!--end of the footer-->
		
		<div></div>
	</body>

</html>
