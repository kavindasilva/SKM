<?php
if($_POST['request1']){
	$brand=$_POST['request1'];
	//$country=$_POST['country'];
	require_once('../../php/dbcon.php');
	if($brand=='--'){
		$sql="SELECT t_id,brand_name,country,tire_size,quantity,status FROM tire";
		
	}
	elseif($brand=="Dunlop-Japan"){
		$sql="SELECT t_id,brand_name,country,tire_size,quantity,status FROM tire WHERE brand_name='Dunlop' AND country='Japan' AND status='required'";
	}
	elseif($brand=="Dunlop-Thaiwan"){
		$sql="SELECT t_id,brand_name,country,tire_size,quantity,status FROM tire WHERE brand_name='Dunlop' AND country='Thaiwan' AND status='required'";
	}
	elseif($brand=="Dunlop-Indonesian"){
		$sql="SELECT t_id,brand_name,country,tire_size,quantity,status FROM tire WHERE brand_name='Dunlop' AND country='Indonesian' AND status='required'";
	}
	elseif($brand=="Kaizen-Japan"){
		$sql="SELECT t_id,brand_name,country,tire_size,quantity,status FROM tire WHERE brand_name='Kaizen' AND country='Japan' AND status='required'";
	}
	elseif($brand=="Kaizen-Thaiwan"){
		$sql="SELECT t_id,brand_name,country,tire_size,quantity,status FROM tire WHERE brand_name='Kaizen' AND country='Thaiwan' AND status='required'";
	}
	else{
		$sql="SELECT t_id,brand_name,country,tire_size,quantity,status FROM tire WHERE brand_name='Kaizen' AND country='Indonesian' AND status='required'";
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
            <?php
            if($brand=='--'){
                ?>
                <td><button class="btn btn-success requestbtn" onclick="requestbtn(this)" disabled>Add to Requests</button></td>
                <?php

            }
            else{
                ?>
                <td><button class="btn btn-success requestbtn" onclick="requestbtn(this)">Add to Requests</button></td>
                <?php

            }
            ?>

		</tr>
		
	<?php
			}
	$conn->close();
	
};


?>