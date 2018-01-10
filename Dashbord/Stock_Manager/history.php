<?php
	//require_once
	require_once('../../php/dbcon.php');
?>

<html>
 <link href="../../css/aos.css" rel="stylesheet">
  <script src="../../js/plugins.js"></script>
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
			echo "<tr><td>".$row['country']."</td>";
			echo "<td>".$row['brand_name']."</td>";
			
			$tttime=$row['sdate']." @ ".$row['stime'];
			echo "<td>".$tttime."</td>"; //time
			echo "<td>".$row['tire_size']."</td>";
			
			echo "<td>".$row['qty']."</td>";
			echo "<td>".$row['unitprice']."</td>";
			echo "<td>".$row['status']."</td>";
			echo "<td>".$row['type']."</td></tr>";
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