  <div style="padding: 7px;">
  <section class="content-header">
   <h1>Dashbord</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
          <li class="active"><a href="#"><i class="fa"></i>Dashbord</a></li>
      </ol>
    </section>
     <div class="box">
      	</div>
   
<!--main menu item goes here-->    
   <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12 dashbordsection">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-edit"></i></span>

            <div class="info-box-content">
            
              <span class="info-box-text">Order</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <button class="form-control dashbordbtn" onClick="dashbordcontrol('neworder');">New order</button>
		<button class="form-control dashbordbtn" onClick="dashbordcontrol('findorder');" >Manage Your orders</button>
        </div>
        <!-- /.col -->
       
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12 dashbordsection">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              
              <span class="info-box-text">Quotations</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <button class="form-control dashbordbtn" name="neworder" onClick="dashbordcontrol('newquotationreq');">New Quotation Request</button>
          <button class="form-control dashbordbtn" name="neworder" onClick="dashbordcontrol('viewQuote');">Recived quotations</button>
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
<!--main menu item concludes here-->  
	
</div>
