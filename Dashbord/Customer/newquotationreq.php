<head>
	<link href="../../css/aos.css" rel="stylesheet">
    <script src="../../js/plugins.js"></script>
</head>
<body>
<?php require_once('../../php/dbcon.php')?>
<?php include '../../assets/missingfield.php'?>
<?php include '../../assets/outofstock.php'?>
<?php include '../../assets/noowner.php'?>
<?php include '../../assets/success.php'?>           
    <!-- Content Header (Page header) -->
    <section class="content-header">
   <h1>
        New quotation request
      </h1>     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#"><i class="fa"></i> Quotations</a></li>
          <li class="active"><a href="#"><i class="fa"></i> New quotation request</a></li>       
      </ol>
    </section>
<div class="box">   		
    	</div>
     <section class="content ">
  <form id="maininvoiceform">
   <!-- invoice items pannel starts here-->

        <div  class="col-xs-3 pull-right" style="width: auto; margin-right: 30px;" data-aos="zoom-in-left">
          <div class="box" >
            <div class="box-header">
              <h3 class="box-title">Quotation Items</h3>
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
                  <th>Quantity</th>
                  <th><a href="#" data-toggle="tooltip" data-placement="top" title="Remove all items" onClick="removeall();"><i class="fa fa-trash" aria-hidden="true" style="font-size: 20px;"></i></a>
                  </th>
                </tr>
                </thead>
                <tbody>                 
                </tbody>
              </table>
            <div class="box-footer">
            <div class="row">
          
            		
            	<div class="col-md-3">
            	<button type="button" class="btn btn-warning" onClick="removeselected();" style="width: 153px" >Remove Selected</button>
            	</div>
				
              	<div class="col-md-3">
            	<button type="button" class="btn btn-primary" onClick="sendRequesition();" style="width: 153px" >Send Requesition</button>
            	</div>
				
            	</div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
			</div></div>
			</form>
			<!-- add tires to invoice pannel goes here-->
<form id="addtiresform" action="#" method="post" class="pull-left" data-aos="zoom-in-right">
 <div class="selectitempanal container">
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
      </select></div></div></br>
       <div class="row">
 	 <div class="col-xs-6">Quantity</div>
 	 <div class="col-xs-6">
 	<input id="quantity" type="number" placeholder="Quantity" required="" class="form-control input-md">
      </select></div></div></br>
<button type="button" class="btn btn-success" style="width: 70px" onClick="validatequotation();">Add</button>
</br></br>
</div></br>
 <div class="form-group ">
  <label for="comment">Quotation Note:</label>
  <textarea class="form-control" rows="5" id="qnote"></textarea>
</div>
 </form>
 <!-- add tires to invoice pannel concludes here-->
	  </section> 
<script src="../../js/formcontrol.js?v=5"></script>
</body>
 <script>
    AOS.init();
 </script>
</html>