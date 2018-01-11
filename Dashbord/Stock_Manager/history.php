<?php
	//require_once
	require_once('../../php/dbcon.php');
?>

<?php
	//restore code
	if(isset($_POST['resto'])){
		$coun=$_POST['country'];
		$brr=$_POST['brand_name'];
		$TID=$_POST['ttid'];
			
		//$_POST['sdate']." @ ".$row['stime'];
		//echo "<td>".$tttime."</td>"; //time
		$ts=$_POST['tire_size'];
		
		$qqq=$_POST['qty'];
		$upp=$_POST['unitprice'];
		$stt=$_POST['status'];
		$typ=$_POST['type'];
		
		$sql4="update tire set country='$coun', brand_name='$brr', quantity=$qqq, unit_price=$upp, status='$stt', t_type='$typ' where t_id=".$TID;
		
		if(!mysqli_query($conn, $sql4)){
			echo mysqli_error($conn);
			return;
		}
		else{
			echo "<script>alert('Data restored successfully');</script>";
			echo "<script>window.location.href='index.php';</script>";
			
		}
		
		
	}
?>

<html>
 <link href="../../css/aos.css" rel="stylesheet">
  <script src="../../js/plugins.js"></script>
  
  <script type="text/javascript">
  	function confirmR() {
	var x = confirm("Are you sure you want to Restore these details?");
	if (x)
		return true;
	else
		return false;
}
  </script>
  
  <section class="content-header">
   <h1>
        History
   </h1>     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#"><i class="fa"></i> Stock</a></li>
          <li class="active"><a href="#"><i class="fa"></i> Manage Stock</a></li>
          <li class="active"><a href="#"><i class="fa"></i> History</a></li>
      </ol>
   </section>
    
<div class="box">   		
    	</div>   
<section class="content">
	<div  class="col-xs-12 col-md-12" >
       <div class="box">
           <div class="box-body" style="overflow-x:auto;" data-aos="zoom-in-right">
    <table class="table table-hover" id="stocktable">
	<thead>
		<tr>
			<th>Country</th>
			<th>Brand name</th>
			<th>Modified time</th>
			<th>Tyre Size</th>
            <th>Qty</th>
            <th>Unit Price</th>
            <th>Status</th>
            <th>Tyre Type</th>
            <th> </th>
		</tr>
	</thead>
	<tbody>
		<?php
			if(!isset($_GET['tid'])){
				echo "<script>alert('tire id not set');</script>";
			}
			//echo "<script>alert('". $_GET['tid']."');</script>";
			
		//table body here
		//$sql="select * from tire t, stocklog s where s.tireid=t.t_id and t.t_id=".$_GET['tid'];
		$sql="select * from stocklog where s.tireid=".$_GET['tid'];
		$sql="select * from tire t, stocklog s where s.tireid=t.t_id and s.tireid=".$_GET['tid'];
		$res=mysqli_query($conn, $sql);
				
		if(!$res){
			echo mysqli_error($conn);
			return;
		}
		elseif(mysqli_num_rows($res)==0){
			echo "<tr><td colspan=7>No history details available</td></tr>";
			return;
		}
		
		while($row=mysqli_fetch_array($res)){
			echo "<form name='abc' method='post' action='history2.php'>";
			
			echo "<input type='text' value='".$row['tireid']."' name='ttid' hidden>";
			
			echo "<tr><td>".$row['country']."</td>"; echo "<input type='text' name='country' value='".$row['country']."' hidden>";
			echo "<td>".$row['brand_name']."</td>"; echo "<input type='text' name='brand_name' value='".$row['brand_name']."' hidden>";
			
			$tttime=$row['sdate']." @ ".$row['stime'];
			echo "<td>".$tttime."</td>"; //time 
			//echo "<input type='text' name='tireid' value='".$row['tireid']."' hidden>";
			
			echo "<td>".$row['tire_size']."</td>"; echo "<input type='text' name='tire_size' value='".$row['tire_size']."' hidden>";
			
			echo "<td>".$row['qty']."</td>"; echo "<input type='text' name='qty' value='".$row['qty']."' hidden>";
			echo "<td>".$row['unitprice']."</td>"; echo "<input type='text' name='unitprice' value='".$row['unitprice']."' hidden>";
			echo "<td>".$row['status']."</td>"; echo "<input type='text' name='status' value='".$row['status']."' hidden>";
			echo "<td>".$row['type']."</td>"; echo "<input type='text' name='type' value='".$row['type']."' hidden>";
			
			echo "<td>";
			echo "<input name='resto' type='submit' value='Restore' onclick='return confirmR();'>";
			echo "</td></tr>";
			
			echo "</form>";
		}
		
		
		?>
	</tbody>
	</table>
			  </div>
		</div>
	</div>
</section>   
   
   
   
   
   
</html>   


<script>
    AOS.init();
</script> 