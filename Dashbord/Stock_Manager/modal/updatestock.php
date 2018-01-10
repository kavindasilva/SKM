<?php
require_once('../../../php/dbcon.php');
$tid=$_POST['tid'];
$country=$_POST['country'];
$brand=$_POST['brand'];
$tsize=$_POST['tsize'];
$qty=$_POST['qty'];
$up=$_POST['up'];
$status=$_POST['status'];
$ttype=$_POST['ttype'];
$getsupplier="SELECT s_id FROM supplier WHERE brand='$brand' and country='$country';";
if($result=mysqli_query($conn,$getsupplier)){
	$sid=mysqli_fetch_array($result)['s_id'];
	$updatestock="UPDATE tire SET country='$country' , brand_name='$brand' ,tire_size='$tsize', orderable_qty=orderable_qty+$qty-quantity , quantity=$qty,unit_price=$up ,status='$status', supplier_s_id=$sid, t_type='$ttype' WHERE t_id=$tid;";
	
	//===================================================================================
	$predata="select *,curdate() as date1, select current_time() as time1 from tire where t_id=$tid";
	$res2=mysqli_query($conn, $predata);
	if($res2){
		$ttid=$res2['t_id'];
		$qty=$res['quantity'];
		$up=$res['unit_price'];
		$stt=$res['status'];
		$ttype=$res['t_type'];
		//$$res['unit_price'];
		
		//tire id, quantity, unit price, status, type
		$predata2="insert into stocklog values(null, 'date1', 'time1', $ttid, $qty, $up, '$stt', '$ttype');";
		
		$res3=mysqli_query($conn, $predata2);
		if($res3){
			//alert eka
			echo "<script>alert('log file updated');</script>";
		}
		else{
			mysqli_error($conn);
			return;
		}
		
	}
	else{
		mysqli_error($conn);
		return;
	}
	//===================================================================================
	
	if(mysqli_query($conn,$updatestock)){
		require_once('../../../assets/changeorderstatus.php');
		
	}
	else
	echo mysqli_error($conn);

}
else
	echo mysqli_error($conn);


?>