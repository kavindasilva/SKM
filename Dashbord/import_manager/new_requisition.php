  <!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="../../css/mystyle.css">

    <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<!--  <script>-->
<!---->
<!--	  $(document).ready(function(){-->
<!--	  $('table#tire_ava tbody tr').click( function () {-->
<!--        alert('i am clicked');-->
<!--		  $('table#tire_ava tbody tr td').load('table#Requisition_itm_tbl tr td');-->
<!--        } );-->
<!--});-->
<!--</script>-->
</head>
<body>
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>New Requision</h1>
      <ol class="breadcrumb">
        <li><a href="navigation.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa"></i> Purchase Requisition</a></li>
        <li class="active">New Requisition</li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="container">
     <form>
      <div class="box">
        </div>
        <div class="row" style="width: auto; margin-left: 72px">
          <strong class="col-xs-2">Tire Brand & Country</strong>
          <div class="col-xs-2">
            <select class="form-control" id="brand" name="brand" >
            <option value="--">Select</option>
             <option value="Dunlop-Japan" >Dunlop-Japan</option>
             <option value="Dunlop-Thaiwan" >Dunlop-Thaiwan</option>
             <option value="Dunlop-Indonesian" >Dunlop-Indonesian</option>
             <option value="Kaizen-Japan" >Kaizen-Japan</option>
             <option value="Kaizen-Thaiwan" >Kaizen-Thaiwan</option>
             <option value="Kaizen-Indonesian" >Kaizen-Indonesian</option>
           </select>
          </div>
          
<!--
          <strong class="col-xs-2">Country</strong>
        
          <div class="col-xs-2">
          <select class="form-control" id="country" name="country">
             <option value="" >Select</option>
             <option value="" >Japan</option>
			  <option value="">Thaiwan</option>
          </select>
          </div>
          
-->
          </div>
          <br>
          <div class="row">
            <div class="col-xs-12" style="width: auto; margin-left: 72px">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Available Tires</h3>
                </div>
                <div class="box-body">
                  <table id="tire_ava" class="table-bordered table-hover" width="920">
                    <thead>
                      <tr>
                        <th>Tire ID</th>
                        <th>Brand</th>
                        <th>Country</th>
                        <th>Size</th>
                        <th>Available Qty</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>


                    <?php
						require_once('../../php/dbcon.php');
						$sql="SELECT t_id,brand_name,country,tire_size,quantity,status FROM tire WHERE status='required'";
						$result = $conn->query($sql);
						$tbl_rw_id=0;
						while($row=$result->fetch_assoc()){
						//$tbl_rw_id=$tbl_rw_id+1;
						?>
						
						<tr class="clickable-row" id="ava_tire_row">
			
						<td><?php echo $row['t_id']?></td>
						<td><?php echo $row['brand_name']?></td>
						<td><?php echo $row['country']?></td>
						<td><?php echo $row['tire_size']?></td>
						<td><?php echo $row['quantity']?></td>
						<td><?php echo $row['status']?></td>
                        <td><button class="btn btn-success requestbtn">Add to Request</button></td>
						</tr>
					
						
					<?php
							}
						$conn->close();
						?>
<!--
                      <td>dj1801</td>
                      <td>18</td>
                      <td>4</td>
                      <td>checked</td>
-->
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12" style="width: auto; margin-left: 72px">
              <div class="box">
                <div class="box-header">
                <h3 class="box-title">Requisition Item</h3></div>
              
              <!-- /.box-header -->
              <div class="box-body">
                <table id="Requisition_itm_tbl" class="table-bordered table-hover" width="920">
                <thead>
                  <tr>
                    <th>Select</th>
                    <th>Tire ID</th>
                    <th>Brand</th>
                    <th>Country</th>
                    <th>Size</th>
                    <th>Required Qty</th>
                  </tr>
                </thead>
                <tbody id="selected_item">

                </tbody>
                </table>
              </div>
              <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
          <div class="additempanal">
       <div class="row" style="background-color:#D2D2D2; margin-left:70px; margin-right: 130px; ">
       </br><div class="col-xs-3">

       <button type="button" class="btn btn-success" style="width: 160px; margin-left: 20px">Send Selected</button></div>
       
    <div class="col-xs-3"><button type="button" class="btn btn-primary send_all_btn" style="width: 160px">Send All Items</button></div>
           <?php

           ?>
  <div class="col-xs-3"><button type="button" class="btn btn-warning" style="width: 160px">Remove Selected Item</button></div>
  <div class="col-xs-3"><button type="button" class="btn btn-danger" style="width: 160px">Remove All Items</button></div></br></br></br>
    </div>
    </div>
</form>

    </div>

<!-- jQuery 3.1.1 -->
<script src="../../js/jquery-3.1.1.min.js"></script>
<script src="../../js/ava_tire_filterjs.js"></script>

<!--    selected tire list table script-->
<script>
    $(".requestbtn").click(function () {
        var tid= this.parentElement.parentElement.getElementsByTagName('td')[0].innerHTML;
        var brand= this.parentElement.parentElement.getElementsByTagName('td')[1].innerHTML;
        var country= this.parentElement.parentElement.getElementsByTagName('td')[2].innerHTML;
        var size= this.parentElement.parentElement.getElementsByTagName('td')[3].innerHTML;
        this.disabled=true;
   $("#selected_item").append("<tr class=\"clickable-row\"> <td><input type='checkbox'></td> <td>"+ tid+"</td> <td>"+brand+"</td> <td>"+country+"</td> <td>"+size+"</td> <td><input type='text'></td></tr>");
    });
</script>

<script>
    $(".remove_all_btn").click(function () {
        

    })
</script>


<!--<script src="../../js/tgoBtnControllerjs.js"></script>-->
</body>


</html>
