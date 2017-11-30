<?php
if($_POST['request1']){
	$brand=$_POST['request1'];
	//$country=$_POST['country'];
	require_once('../../php/dbcon.php');
	if($brand=='--'){
		$sql="SELECT t_id,brand_name,country,tire_size,quantity,status FROM tire";
		
	}
	elseif($brand=="Dunlop-Japan"){
		$sql="SELECT t_id,brand_name,country,tire_size,quantity,status FROM tire WHERE brand_name='Dunlop' AND country='Japan'";
	}
	elseif($brand=="Dunlop-Thaiwan"){
		$sql="SELECT t_id,brand_name,country,tire_size,quantity,status FROM tire WHERE brand_name='Dunlop' AND country='Thaiwan'";
	}
	elseif($brand=="Dunlop-Indonesian"){
		$sql="SELECT t_id,brand_name,country,tire_size,quantity,status FROM tire WHERE brand_name='Dunlop' AND country='Indonesian'";
	}
	elseif($brand=="Kaizen-Japan"){
		$sql="SELECT t_id,brand_name,country,tire_size,quantity,status FROM tire WHERE brand_name='Kaizen' AND country='Japan'";
	}
	elseif($brand=="Kaizen-Thaiwan"){
		$sql="SELECT t_id,brand_name,country,tire_size,quantity,status FROM tire WHERE brand_name='Kaizen' AND country='Thaiwan'";
	}
	else{
		$sql="SELECT t_id,brand_name,country,tire_size,quantity,status FROM tire WHERE brand_name='Kaizen' AND country='Indonesian'";
	}
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