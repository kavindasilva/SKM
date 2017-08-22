<!DOCTYPE html>
<html>

<head>
   <link rel="stylesheet" href="../../css/mystyle.css">
    <!-- Google Font -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body >
<?php include '../../assets/missingfield.php'?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
   <h1>
        New Invoice
      </h1>     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#"><i class="fa"></i> Invoice</a></li>
          <li class="active"><a href="#"><i class="fa"></i> New Invoice</a></li>       
      </ol>
    </section>
<div class="box">   		
    	</div>
     <section class="content ">
  <form id="maininvoiceform">
	<div class="form-group">
 		 <div class="row">
      		<strong class="col-xs-2">Dealer Shop Name </strong>
      	
      	<div class="col-xs-2">
 	<select class="form-control" >
        <option value="" >Select</option>
      		 </select>
		 </div>
		 <strong class="col-xs-1">or </strong>
		 <strong class="col-xs-2">Regular Customer Company Name </strong>
      	
      	<div class="col-xs-2">
 		<select class="form-control" >
        <option value="" >Select</option>
      		 </select>
		 </div>
		 
	   <!-- display date-->
		<div class="col-xs-2 control-label" style="margin-left: 10px;"><label>Date : </label><label id="date"></label></div>
		
	 </div>
  		 
  	
   	
	  <script>
		  n =  new Date();
		  y = n.getFullYear();
		  m = n.getMonth() + 1;
		  d = n.getDate();
		  document.getElementById("date").innerHTML = y + "/" + m + "/" + d;
		</script>
  
	  </div></br>


   <!-- invoice items pannel starts here-->
  <div class="row">
        <div  class="col-xs-3 pull-right" style="width: auto; margin-right: 50px;">
          <div class="box" >
            <div class="box-header">
              <h3 class="box-title">Invoice Items</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="orderitems" class="table-bordered table-hover" width="700" >
                <thead>
                <tr>
                 <th><input type=checkbox></th>
                  <th>Brand</th>
                  <th>Country</th>
                  <th>Tire Size</th>
                  <th>Unit Price(Rs.)</th>
                  <th>Quantity</th>
                  <th>Total Amount</th>
                </tr>
                </thead>
               
                <tbody>
                                 
                </tbody>
                
              </table>
            </div>
            <div class="box-footer">
            <div class="row">
            <div class="col-md-3">
            	<button type="button" class="btn btn-danger" style="width: 153px" onClick="removeall()">Remove All Items</button>
            	</div>
            	<div class="col-md-3 pull-right" id="subtotal">
            		<label class="pricelabel" id="subtotal"></label>
            	</div>
            	<div class="col-md-3 pull-right">
            		<strong>Sub Total</strong>
				</div>
				</div></br>
            	<div class="row">
            		<div class="col-md-3 pull-right">
            		<select class="form-control" id="discount">
            			<option value=".1">10%</option>
            			<option value=".15">15%</option>
            		</select>
            	</div>
            	<div class="col-md-3">
            	<button type="button" class="btn btn-warning" style="width: 153px">Remove Selected Item</button>
            	</div>
            	<div class="col-md-3 pull-right">
            		<strong>Discount Type</strong>
            	</div>
            	</div></br>
            	<div class="row">
            		<div class="col-md-3 pull-right">
            		<label class="pricelabel " id="dis"></label>
            	</div>
            	<div class="col-md-3 pull-right">
            		<strong>Discount</strong>
            	</div>
            	</div>
            	<div class="row"><div class="col-md-3">
            	<button type="button" class="btn btn-primary" onClick="a();" style="width: 153px" >Generate Invoice</button>
            	</div>
            		<div class="col-md-3 pull-right">
            		<label class="pricelabel" id="net"></label>
            	</div>
            	<div class="col-md-3 pull-right">
            		<strong>Net Amount</strong>
            	</div>
            	</div>
            	
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
	  </div>
			</form>
			<!-- add tires to invoice pannel goes here-->
<form id="addtiresform" action="#" method="post" class="pull-left">
 <div class="selectitempanal container" style="margin-left: 15px;">
	 <h4><strong>Add tires</strong></h3>
 	 <div class="row">
 	 <div class="col-xs-6">Brand</div>
 	 <div class="col-xs-6">
 	<select class="form-control" id="brand">
        <option value="" >Select</option>
       <option value="Dunlop" >Dunlop</option>
       <option value="Kaizen" >Kaizen</option>
		 </select></div></div></br>
      <div class="row">
 	 <div class="col-xs-6">Country</div>
 	 <div class="col-xs-6">
 	<select class="form-control" id="country" >
        <option value="" >Select</option>
       <option value="Japan" >Japan</option>
       <option value="Indonesion" >Indonesion</option>
        <option value="Thaiwan" >Thaiwan</option>
		 </select></div></div></br>
       <div class="row">
 	 <div class="col-xs-6">Tire Size</div>
 	 <div class="col-xs-6">
 	<select class="form-control" id="tiresize" >
        <option value="" >Select</option>
        <option value="165R16" >165R16</option>
      </select></div></div></br>
       <div class="row">
 	 <div class="col-xs-6">Quantity</div>
 	 <div class="col-xs-6">
 	<input id="quantity" type="text" placeholder="Quantity" required="" class="form-control input-md">
      </select></div></div></br>
<button type="button" class="btn btn-success" style="width: 70px" onClick="validate();">Add</button>
</br></br>
 </div>
 </form>
 <!-- add tires to invoice pannel concludes here-->
	  </section>
<!-- jQuery 3.1.1 -->
<script src="../../js/jquery-3.1.1.min.js"></script>   
  
<!-- inline javascript goes here-->
<script>
	function validate(){
		x=document.getElementById('brand').value;
		y=document.getElementById('country').value;
		z=document.getElementById('tiresize').value;
		q=document.getElementById('quantity').value;
		if(x=="" ||y==""||z==""||q=="")
			{
				$('.modal-danger').modal('show');
				 
			}
		else{
			
			$.ajax({
				type:"post",
				url:"assets/loadinvoiceitem.php",
				data:({brand:x,country:y,tiresize:z}),
				success:function(data){
					
				 $('#orderitems').append("<tr class=\"removable\"><td><input type=checkbox></td><td>" + x+ "</td><td>" + y + "</td><td>" + z + "</td><td>" + data + "</td><td>" + q + "</td><td>" + data*q + "</td></tr>");
				validate.sum+=data*q;
				updatedata();
				}	
			});
		}
	}
	validate.sum=0;
	function updatedata(){
				$("#subtotal").html(validate.sum);
				var discount=validate.sum*document.getElementById('discount').value;	
				$("#dis").html(discount);
				var netamount=validate.sum-discount;
				$("#net").html(netamount);	
	}
	
	function removeall(){

		validate.sum=0;
		$(".table-bordered  .removable").remove();
	}
	function a(){
	//$('#maininvoiceform').on('submit',function(){
		var fn=document.getElementById('textinputfname').value;
		var ln=document.getElementById('textinputlname').value;
		var cn=document.getElementById('textinputcontact').value;
		var tot=document.getElementById('subtotal').textContent;
		var dis=document.getElementById('dis').textContent;
		var net=document.getElementById('net').textContent;
	
	  $.ajax({
		  type:"post",
		  url:"controler/cusinvoicecontroler.php",
		  data:({fname:fn,lname:ln,contact:cn,total:tot,discount:dis,netamount:net}),
		  success:function(data){
			  alert(data);
		  }
	  });
	}//);
	
	$('#discount').on('change',function(){
		updatedata();
	});
	
</script>


</body>


</html>
