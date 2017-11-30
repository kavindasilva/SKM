<!--main menu item goes here-->
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12 dashbordsection">
        <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-edit"></i></span>

            <div class="info-box-content">

                <span class="info-box-text">Purchase Requisitions</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <button class="form-control dashbordbtn" onClick="dashbordcontrol('neworder');">New Requisition</button>
        <button class="form-control dashbordbtn" onClick="dashbordcontrol('findorder');" >Pending Requisition</button>
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12 dashbordsection">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-table"></i></span>

            <div class="info-box-content">

                <span class="info-box-text">Purchase confirmation</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <button class="form-control dashbordbtn" onClick="dashbordcontrol('newinvoice');"></button>
        <button class="form-control dashbordbtn" onClick="dashbordcontrol('findinvoice');"></button>
    </div>

</div>