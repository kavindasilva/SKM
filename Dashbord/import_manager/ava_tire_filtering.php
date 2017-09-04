<?php
if($_POST['request']){
	$request=$_POST['request'];
	require_once('../../php/dbcon.php');
	$sql="SELECT t_id,brand_name,country,tire_size,quantity,status FROM tire WHERE brand_name='$request'";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		?>
		
		<tr>
			<td><?php echo $row['t_id']?></td>
			<td><?php echo $row['brand_name']?></td>
			<td><?php echo $row['country']?></td>
			<td><?php echo $row['tire_size']?></td>
			<td><?php echo $row['quantity']?></td>
			<td><?php echo $row['status']?></td>
		</tr>
		
	<?php
			}
	$conn->close();
	
};

?>