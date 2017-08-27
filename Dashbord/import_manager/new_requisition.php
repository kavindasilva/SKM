  <!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="../../css/mystyle.css">

    <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
      <div class="box">
        </div>
        <div class="row">
          <strong class="col-xs-2">Tire Brand</strong>
          <div class="col-xs-2">
            <select class="form-control" >
            <option value="">Select</option>
             <option value="" >Dunlop</option>
             <option value="" >Kaizen</option>
           </select>
          </div>
          
          <strong class="col-xs-2">Country</strong>
        
          <div class="col-xs-2">
          <select class="form-control" >
             <option value="" >Select</option>
             <option value="" >Japan</option>
			  <option value="">Thaiwan</option>
          </select>
          </div>
          <button class="col-xs-1 btn btn-success" type="button">Go</button>
          </div>
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
                        <th>Size</th>
                        <th>Available Qty</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <td>dj1801</td>
                      <td>18</td>
                      <td>4</td>
                      <td>checked</td>
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
                    <th>Size</th>
                    <th>Required Qty</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  	<td><input type="checkbox" name="select_tire"></td>
                    <td>dj1802</td>
                    <td>18</td>
                    <td><input type="name" name="qty"></td>
                  </tr>
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
       
    <div class="col-xs-3"><button type="button" class="btn btn-primary" style="width: 160px">Send All Items</button></div>
  <div class="col-xs-3"><button type="button" class="btn btn-warning" style="width: 160px">Remove Selected Item</button></div>
  <div class="col-xs-3"><button type="button" class="btn btn-danger" style="width: 160px">Remove All Items</button></div></br></br></br>
    </div>
    </div>

    </div>



</body>


</html>
