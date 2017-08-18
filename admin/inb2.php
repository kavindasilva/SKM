<?php 
require_once '../dbcon.php';
//session maintainence
?>

<?php include 'in1.php'; ?>
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
				<a href="./edituser.php"><input type=button value='add new user'></a><br>
				<a href="./user.php"><input type=button value='add new user'></a><br>
				
				<?php
				$checkName = "select * from users"; // where email='$name'";
	
				$result = mysqli_query($conn, $checkName);
	
				if (!($result)) {
					//echo "There are no users in the system";
					echo "There is an error";
				}
				$rowcount = mysqli_num_rows($result);
				if($rowcount==0)
					echo "there are no users in the system";
				else{
					echo "<form name='userlist' action='' method='post'>";
					echo "<table border=1>";
					while($row=mysqli_fetch_array($result)){
						echo "<tr><td>".$row['uid']."</td>";
						echo "<td>".$row['name']. "</td>";
						echo "<td>".$row['type']."</td>";
						
						echo "<td><input type='submit' value='edit'>".$row['uid']."</td>";
						echo "<td><input type='submit' value='remove'>".$row['type']."</td></tr>";
						
					}
					echo "</table>";
					echo "</form>";
				}
				
				?>

				</center>
							
			</div>
			<!--end of the main page-->
			<?php include 'in2.php'; ?>
