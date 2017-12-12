
<?php
/**
	This is the chief managers normal reports(without date limits) generation control class
	monthly purchase_requisition report
*/
require_once "../../php/dbcon.php";

$year=$_GET['yr'];
$months=$_GET['mnth'];
$strSQL = " SELECT * FROM purchase_requisition p, supplier s, user u where u.user_name=s.user_user_name and s.s_id=p.supplier_s_id and year(p.date)='$year' and month(p.date)='$months'";

$objQuery = mysqli_query($conn,$strSQL) or die ("Database query failed: $strSQL<hr>" . mysqli_error($conn)); //result set
echo "Month = ".$year."/".$months."<BR/>";

if(mysqli_num_rows($objQuery)==0){
	echo "No data in system";
}
else{
	
	echo "<table>";
	echo "<tr> <th>PR No</th> <th>Date</th> <th>Brand</th> <th>Country</th> <th>User_name</th> 
	 <th>Email</th> <th>Status</th> </tr>";
	while ($eachResult=mysqli_fetch_assoc($objQuery)) 
	{ //width
		/*$this->Cell(10);
		if($eachResult["quantity"]<=20){
			$this->SetFillColor(200,100,100);
		}*/
		//$this->Cell(10,6,$tmpcnt,1);
		echo "<tr>";
		echo "<td>".$eachResult["pr_no"]."</td>";
		echo "<td>".$eachResult["date"]."</td>";
		echo "<td>".$eachResult["brand"]."</td>";
		echo "<td>".$eachResult["country"]."</td>";
		
		echo "<td>".$eachResult["user_name"]."</td>";
		//echo "<td>".$eachResult["unit_price"]."</td>";
		
		echo "<td>".$eachResult["email"]."</td>";
		echo "<td>".$eachResult["status"]."</td>";
		
		//$TOTsales+=$eachResult["quantity"]*$eachResult["unit_price"];
		 	 	 	
		echo "</tr>"; 	
	}
	//echo "<tr><td colspan=6>Total Gross income</td> <td>".$TOTsales."</td> </tr>";
	echo "</table>";

}


//echo "file called";
?>

<script type="text/javascript">
	function openTab(url){
		window.open(url, '_blank');
	}
</script>








