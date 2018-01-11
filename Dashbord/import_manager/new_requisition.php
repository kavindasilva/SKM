  <!DOCTYPE html>
<html>
<?php include '../../assets/success.php';
    include '../../assets/missing.php';

?><!--  -->
<head>

  <link rel="stylesheet" href="../../css/mystyle.css">

    <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<link href="../../css/aos.css" rel="stylesheet">
    <script src="../../js/plugins.js"></script>
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
          <strong class="col-xs-2" data-aos="zoom-out-right">Tire Brand & Country</strong>
          <div class="col-xs-2" data-aos="zoom-out-right">
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
          <div class="pull-right" style="margin-right: 150px;" data-aos="zoom-out-left">
              <label class="form-group">Purchase requesition number</label>
              <input id="pr_no" class="form-control"  value="
<?php
              require_once('../../php/dbcon.php');

              $query="SELECT MAX(pr_no)  AS maxsno FROM purchase_requisition";
              $result=mysqli_query($conn,$query);
              $pr_no=0;
              if($obj=mysqli_fetch_object($result)){
                  $pr_no=$obj->maxsno;
                  $pr_no++;
              }
              echo($pr_no);

?>
"disabled>
          </div>

          </div>
          <br>
          <div class="row">
            <div class="col-xs-12" style="width: auto; margin-left: 72px"  data-aos="zoom-out-right">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Required Tires</h3>
                </div>
                <div class="box-body" style="overflow-x:auto;">
                  <table id="tire_ava" class="table-bordered table-hover" width="920">
                    <thead>
                      <tr>
                        <th>Tire ID</th>
                        <th>Brand</th>
                        <th>Country</th>
                        <th>Size</th>
                        <th>Available Qty</th>
                        <th>Status</th>
                        <th>Requested Qty</th>
                      </tr>
                    </thead>
                    <tbody>

<!--loading pending and required tires to first tbl-->
                    <?php
						require_once('../../php/dbcon.php');
						$sql="SELECT t_id,brand_name,country,tire_size,quantity,status,requested_amount FROM tire WHERE status='required' OR status='pending'";
						$result = $conn->query($sql);
						$tbl_rw_id=0;
						while($row=$result->fetch_assoc()){
												?>
						
						<tr class="clickable-row" id="ava_tire_row">
			
						<td><?php echo $row['t_id']?></td>
						<td><?php echo $row['brand_name']?></td>
						<td><?php echo $row['country']?></td>
						<td><?php echo $row['tire_size']?></td>
						<td><?php echo $row['quantity']?></td>
						<td><?php echo $row['status']?></td>
                        <td><?php echo $row['requested_amount']?></td>
                        <td><button class="btn btn-success requestbtn" onclick="requestbtn(this)" disabled>Add to Requests</button></td>
						</tr>
					
						
					<?php
							}
						$conn->close();
						?>
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
              <div class="box-body" style="overflow-x:auto;">
<!--                  2nd tbl-->
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
<!--getting tbody data bellow script-->
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

       <button type="button" class="btn btn-success" id="send_selected_btn" style="width: 160px;">Send Selected</button></div>
  <div class="col-xs-3"><button type="button" class="btn btn-primary" id="send_all_btn" style="width: 160px">Send All Items</button></div>
  <div class="col-xs-3"><button type="button" id="selected_remove_btn" class="btn btn-warning" style="width: 160px">Remove Selected Item</button></div>
  <div class="col-xs-3"><button type="button" id="remove_all_btn" class="btn btn-danger" style="width: 160px">Remove All Items</button></div></br></br></br>
    </div>
    </div>
</form>

    </div>

<!-- jQuery 3.1.1 -->
<!--<script src="../../js/jquery-3.1.1.min.js"></script>-->
<script src="../../js/ava_tire_filterjs.js"></script>

<!--    selected tire list table script-->
<script>
	$('#brand').change(function(){
		$('#selected_item').children().remove();
	});
	//1st tbl requestbtn function
  function requestbtn(element) {
        var tid= element.parentElement.parentElement.getElementsByTagName('td')[0].innerHTML;
        var brand= element.parentElement.parentElement.getElementsByTagName('td')[1].innerHTML;
        var country= element.parentElement.parentElement.getElementsByTagName('td')[2].innerHTML;
        var size= element.parentElement.parentElement.getElementsByTagName('td')[3].innerHTML;
        var req_qty= element.parentElement.parentElement.getElementsByTagName('td')[6].innerHTML;
      element.disabled=true;
      //load 2nd tbl tbody
   $("#selected_item").append("<tr class=\"clickable-row\"> <td><input type='checkbox' id='is_selected_tire'></td> <td>"+ tid+"</td> <td>"+brand+"</td> <td>"+country+"</td> <td>"+size+"</td> <td><input type='number'  value='"+req_qty+"'></td></tr>");
      document.getElementsByClassName('req_qty').value = req_qty;
  }
</script>

<!--    remove all button script-->
<script>
    $("#remove_all_btn").click(function () {
        $("#selected_item tr").remove();
        $(".requestbtn").prop('disabled', false);
    });
</script>

<!--    remove selected button script-->
<script>
    $("#selected_remove_btn").click(function () {
        var x = document.getElementById("Requisition_itm_tbl").rows.length;
        for(i=1;i<x;i++){
            if(document.getElementById("Requisition_itm_tbl").rows[i].cells[0].children[0].checked){
                document.getElementById("Requisition_itm_tbl").deleteRow(i);
                i--;
                x--;
            }
        }
    });
</script>

<script>
    $("#send_selected_btn").click(function () {
        var x = document.getElementById("Requisition_itm_tbl").rows.length;
        //j is flag for catching one pr_no
        var j=0;
        var pr_no=$('#pr_no').val();
        for(i=1;i<x;i++){
            if(document.getElementById("Requisition_itm_tbl").rows[i].cells[0].children[0].checked){
                var tire_id = document.getElementById("Requisition_itm_tbl").rows[i].cells[1].innerHTML;
                var qty = document.getElementById("Requisition_itm_tbl").rows[i].cells[5].children[0].value;
                if(qty && qty>=0){

                    //alert(qty);
                    if(j==0){
                        $.ajax({
                            type:"post",
                            url:"pr_quary.php",
                            data:{tire_id:tire_id,pr_no:pr_no},
                            success:function (data) {
                                document.getElementById('message1').innerHTML="Successfully Requested";
                                $('#modal-success').modal('show');
                                // document.getElementById('message1').innerHTML="Successfully Requested";
                                // $('#modal-success').modal('show');
                            }
                        });
                        j++;
                    }
                    //quary.php has pr_item tbl inserting and update tire tbl status as pending
                    $.ajax({
                        type:"post",
                        url:"quary.php",
                        data:{tire_id:tire_id,pr_no:pr_no,qty:qty},
                        success:function (data) {

                            //document.getElementById('message1').innerHTML="Successfully Requested";
                        }
                    });
                    document.getElementById("Requisition_itm_tbl").deleteRow(i);
                     i--;
                     x--;

                }
                else{
                    document.getElementById('message').innerHTML="There are null values or minus quantity";
                    $('#modal-missing').modal('show');
                    break;
                }

            }
        //incrementing pr_no
        }$('#pr_no').val(parseInt($('#pr_no').val())+1);


    })
</script>
<script>
    $("#send_all_btn").click(function () {
       // document.getElementById('message1').innerHTML="New stock item added successfully";
        //$('#successModal').modal('show');
        var x = document.getElementById("Requisition_itm_tbl").rows.length;
        //j for catching one pr_no
        var j=0;
        var pr_no=$('#pr_no').val();
        for(i=1;i<x;i++){
                var tire_id = document.getElementById("Requisition_itm_tbl").rows[i].cells[1].innerHTML;
                var qty = document.getElementById("Requisition_itm_tbl").rows[i].cells[5].children[0].value;
                if(qty && qty>0){
                    if(j==0){
                        $.ajax({
                            type:"post",
                            url:"pr_quary.php",
                            data:{tire_id:tire_id,pr_no:pr_no},
                            success:function (data) {
                                document.getElementById('message1').innerHTML="Successfully Requested";
                                $('#modal-success').modal('show');

                            }

                        });
                        j++;
                    }
                    $.ajax({
                        type:"post",
                        url:"quary.php",
                        data:{tire_id:tire_id,pr_no:pr_no,qty:qty},
                        success:function (data) {
                        }
                    });
                    document.getElementById("Requisition_itm_tbl").deleteRow(i);
                    i--;
                    x--;

                }
                else{
                    document.getElementById('message').innerHTML="There are null values or minus quantity";
                    $('#modal-missing').modal('show');
                    break;
                }



        }$('#pr_no').val(parseInt($('#pr_no').val())+1);
    });
	AOS.init();
</script>    
<!--<script src="../../js/tgoBtnControllerjs.js"></script>-->
</body>
</html>
<!--  <div id="successModal" class="modal fade" role="dialog">-->
<!--      <div class="modal-dialog">-->
<!--          <div class="modal-content">-->
<!--              <div class="modal-header">-->
<!--                  <button type="button" class="close" data-dismiss="modal">&times;</button>-->
<!--              </div>-->
<!--              <div class="modal-body">-->
<!--                  <h2>Success</h2>-->
<!--              </div>-->
<!--          </div>-->
<!--      </div>-->
<!---->
<!--  </div>-->
