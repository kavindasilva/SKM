<?php
// this file gives monthly sales of dunlop and kaizen tires
require_once('../../php/dbcon.php');
function getreport($brandtype){
echo "[";	
for($month_given=6;$month_given<=12;$month_given++)	{
$tcount=0;
	
$getinvoce="SELECT * FROM sales_order";
if($result=mysqli_query($GLOBALS['conn'],$getinvoce)){
	while($order=mysqli_fetch_array($result)){//taking each slaes order
		$date=$order['date'];
		$date=explode("-",$date);
		$month=$date[1];
		//echo $month;
		if($month_given==$month){//check the month is matchin to given month
			//then get the order items of that order
			$order_items="SELECT * FROM order_item where sord_no=\"".$order['sord_no']."\" and status='Issued';";
			if($result2=mysqli_query($GLOBALS['conn'],$order_items)){
				while($order_item=mysqli_fetch_array($result2)){//taking each order item
					$tid=$order_item['tire_t_id'];
					$gettire="SELECT brand_name FROM tire WHERE t_id=$tid";
					$result3=mysqli_query($GLOBALS['conn'],$gettire);	
					$tire=mysqli_fetch_array($result3);
					if($tire['brand_name']==$brandtype){
						$tcount+=$order_item['qty'];
					}
					
					
				}
			}
		}
	}
if($month_given==12){
	echo $tcount."]";
}
else{
	echo $tcount.",";
}	

}
else
	echo mysqli_error($conn);	
}
}


?>