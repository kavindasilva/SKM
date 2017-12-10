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
<div class=" container col-md-10 col-md-offset-1">
    <div class="col-md-6 col-sm-6 col-xs-12 dashbordsection">
        <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-edit"></i></span>

            <div class="info-box-content">

                <span class="info-box-text">Purchase Requisitions</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <button class="form-control dashbordbtn" onClick="dashbordcontrol('new_requisition');">New Requisition</button>
        <button class="form-control dashbordbtn" onClick="dashbordcontrol('pending_requision');" >Pending Requisition</button>
    </div>
    <!-- /.col -->
    <div class="col-md-6 col-sm-6 col-xs-12 dashbordsection">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-table"></i></span>

            <div class="info-box-content">

                <span class="info-box-text">Purchase confirmation</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <button class="form-control dashbordbtn" onClick="dashbordcontrol('received_requisition');">Received Requisition</button>
        <button class="form-control dashbordbtn" onClick="dashbordcontrol('confirmed_requisition');"> Confirmed Requisition</button>
    </div>

</div>
</div>