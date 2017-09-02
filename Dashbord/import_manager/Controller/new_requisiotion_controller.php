<html>
<head>
	
</head>
<?php
require_once('../../../php/dbcon.php');

//if (isset($_POST['goBtn'])){
	// tire selecting query
	$sql="SELECT t_id,tire_size,quantity,status FROM tire";
	//mysql_select_db("skm") or die;
	$result = $conn->query($sql);
	//$rowNo = mysql_num_rows($result);
	?>
	<table>
	<?php
	while($row=$result->fetch_assoc()){
		?>
		<tr>
			
			<td><?php echo $row['t_id']?></td>
			<td><?php echo $row['tire_size']?></td>
			<td><?php echo $row['quantity']?></td>
			<td><?php echo $row['status']?></td>
		</tr>
		<br>
		<?php
	}
	?>
	</table>
	<?php
	//echo $result;
//	echo '<script language="javascript">';
//	echo 'alert("New record created successfully")';
//	echo '</script>';
//	exit;
//}

?>
</html>