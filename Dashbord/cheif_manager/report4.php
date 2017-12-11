
<?php
/**
	This is the chief managers normal reports(without date limits) generation control class
	monthly sales report
*/
require_once "../../php/dbcon.php";

$strSQL = "SELECT i.sales_order_sord_no, sum(i.net_amount), sum(i.discount) FROM invoice i, sales_order s where i.sales_order_sord_no=s.sord_no AND i.STATUS='paid' and year(i.date)='2017' and month(i.date)='12' GROUP by i.sales_order_sord_no ";

$strSQL="SELECT i.sales_order_sord_no, t.t_id
FROM invoice i, sales_order s, invoice_item it, tire t 
where i.sales_order_sord_no=s.sord_no and it.invoice_no=i.invoice_no and it.tire_t_id=t.t_id
AND i.STATUS='paid' 
and year(i.date)='2017' and month(i.date)='12'
GROUP by t.t_id";

$objQuery = mysqli_query($conn,$strSQL) or die ("Database query failed: $strSQL<hr>" . mysqli_error($conn)); //result set


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

if(mysqli_num_rows($objQuery)==0){
	echo "No data in system";
}
else{
	echo "<table>";
	echo "<tr> <th>Tire id</th> <th>Brand</th> <th>Country</th> <th>type</th> <th>Size</th> 
	<th>unit price(Rs.)</th> <th>Quantity</th> </tr>";
	while ($eachResult=mysqli_fetch_assoc($objQuery)) 
	{ //width
		/*$this->Cell(10);
		if($eachResult["quantity"]<=20){
			$this->SetFillColor(200,100,100);
		}*/
		//$this->Cell(10,6,$tmpcnt,1);
		echo "<tr>";
		echo "<td>".$eachResult["t_id"]."</td>";
		echo "<td>".$eachResult["brand_name"]."</td>";
		echo "<td>".$eachResult["country"]."</td>";
		
		echo "<td>".$eachResult["t_type"]."</td>";
		echo "<td>".$eachResult["tire_size"]."</td>";
		echo "<td>".$eachResult["unit_price"]."</td>";
		
		echo "<td>".$eachResult["quantity"]."</td>";
		/*
		$this->SetFillColor(100,100,100);
		$this->Ln();
		$tmpcnt++;
		$this->SetFillColor(255,255,255);*/
		 	 	 	
		echo "</tr>"; 	
	}
	echo "</table>";
}


//echo "file called";
?>

<script type="text/javascript">
	function openTab(url){
		window.open(url, '_blank');
	}
</script>








