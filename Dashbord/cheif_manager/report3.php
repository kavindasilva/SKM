
<?php
/**
	This is the chief managers normal reports.
	Monthly sold items quantity
*/
require_once "../../php/dbcon.php";

//$date=$_POST['months'];
$year=$_GET['yr'];
$months=$_GET['mnth'];
//$year='2017';
//$months='1';

//$strSQL = "Select * From tire;";
//$strSQL="SELECT sum(o.qty) FROM tire t, sales_order s, order_item o where o.tire_t_id=t.t_id and o.sord_no=s.sord_no and o.status='available'";

//$strSQL="SELECT t.t_id, t.brand_name,t.country,t.tire_size,sum(o.qty) as totq FROM tire t, sales_order s, order_item o where o.tire_t_id=t.t_id and o.sord_no=s.sord_no and o.status='available' GROUP by t.t_id";

$strSQL="SELECT t.t_id, t.brand_name,t.country,t.tire_size,sum(o.qty) as totq FROM tire t, sales_order s, order_item o where o.tire_t_id=t.t_id and o.sord_no=s.sord_no and o.status='issued' and year(s.date)='$year' and month(s.date)='$months'  GROUP by t.t_id";

$objQuery = mysqli_query($conn,$strSQL) or die ("Database query failed: $strSQL<hr>" . mysqli_error($conn)); //result set
echo "Month = ".$year."/".$months."<BR/>";

if(mysqli_num_rows($objQuery)==0){
	echo "No data in system";
}
else{
	echo "<table>";
	echo "<tr> <th>Tire id</th> <th>Brand</th> <th>Country</th>"; //<th>type</th>
	echo " <th>Size</th>";// <th>unit price(Rs.)</th> 
	echo "<th>Quantity</th> </tr>";
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
		
		//echo "<td>".$eachResult["t_type"]."</td>";
		echo "<td>".$eachResult["tire_size"]."</td>";
		//echo "<td>".$eachResult["unit_price"]."</td>";
		
		echo "<td>".$eachResult["totq"]."</td>";
	 	 	 	
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








