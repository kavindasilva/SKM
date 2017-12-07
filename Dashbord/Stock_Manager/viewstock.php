<?php require_once('../../php/dbcon.php')?>
  <section class="content-header">
   <h1>
        Manage Stock
      </h1>     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#"><i class="fa"></i> Stock</a></li>
          <li class="active"><a href="#"><i class="fa"></i> Manage Stock</a></li>
      </ol>
    </section>
<div class="box">   		
    	</div>
     <section class="content">
         <div  class="col-xs-12 col-md-12" >
          <div class="box">
           <div class="box-body">
    <table class="table table-hover" id="">
	<thead>
		<tr>
			<th>Index Nubmer</th>
			<th>Country</th>
			<th>Brand name</th>
			<th>Tyre Size</th>
            <th>Qty</th>
            <th>Unit Price</th>
            <th>Status</th>
            <th>Tyre Type</th>
            <th> </th>
		</tr>
	</thead>
	<tbody>
	<tr>
		<td><input id="index" class="form-control" disabled
		value="
		<?php
				$query2="SELECT MAX(t_id) AS maxtid FROM tire";
				$result=mysqli_query($conn,$query2);
				$tid=0;									  
				if($obj=mysqli_fetch_object($result)){
				$tid=$obj->maxtid;
				$tid++;	
				}
				echo($tid);
													  
													  ?>
		
		"></td>
		<td><select id = "country" class="form-control" style="width: 100px;">

				<option value="japan">Japan</option>
				<option value="india">Indonesia</option>
				<option value="malaysia">Thaiwan</option>
			</select>
		</td>

        <td><select id = "brand" class="form-control" style="width: 100px;">
				<option value="Dunlop">Dunlop</option>
				<option value="Kaizen">Kaizen</option>

			</select>
		</td>
		<td><input id="size"  class="form-control"></td>
        <td><input id="qty"  class="form-control"></td>
        <td><input id="price"  class="form-control"></td>
		<td><input id="tp"  class="form-control" value"Available" placeholder="Available" disabled></td>
        <td><input id="ttype"  class="form-control"></td>
		<td><button class="btn btn-success col-md-10 btn-sm" style="width:100%;" id="addbtn"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;Add</button></td>
	</tr>	
	<?php
		$gettires="SELECT * from tire";
		$tires=mysqli_query($conn,$gettires);
		if($tires){
		while($tire=mysqli_fetch_array($tires)){	
		
		echo"<tr id=\"".$tire['t_id']."\"><td><input value=".$tire['t_id']." style=\"text-align:center\" disabled class=\"form-control\"></td><td class=\"clickMe\"><span class=\"label label-default \">".$tire['country']."</span>
		<input id=\"textBox2\" class=\"blur\"></td><td class=\"clickMe\"><span class=\"label label-default \">".$tire['brand_name']."</span>
        <input id=\"textBox1\" class=\"blur\"></td><td class=\"clickMe\"><span class=\"label label-default \">".$tire['tire_size']."</span>
        <input id=\"textBox3\" class=\"blur\"></td><td class=\"clickMe\"><span class=\"label label-default \">".$tire['quantity']."</span>
        <input id=\"textBox4\" class=\"blur\"></td><td class=\"clickMe\"><span class=\"label label-default \">".$tire['unit_price']."</span>
        <input id=\"textBox5\" class=\"blur\"></td><td class=\"clickMe\"><span class=\"label label-default \">".$tire['status']."</span>
        <input id=\"textBox6\" class=\"blur\"></td><td class=\"clickMe\"><span class=\"label label-default \">".$tire['t_type']."</span>
        <input id=\"textBox7\" class=\"blur\"></td><td><a href=\"#\" class=\"delete\" data-singleton=\"true\" data-toggle=\"confirmation-singleton\" data-placement=\"top\" title=\"Delete this stock item?\"><i class=\"fa fa-trash \" aria-hidden=\"true\" style=\"font-size: 22px;\"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"#\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Save\"><i class=\"fa fa-floppy-o\" aria-hidden=\"true\" style=\"font-size: 22px;\"></i></a></td></tr>";
		}
		
		}
		
		?>
		
	</tbody>
		
	</table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
	  </div>
</section>
<script src="../../js/formcontrol.js?v=2"></script>
<script>
$('.clickMe').click(function () {
    "use strict";
    this.firstChild.style.display = "none";
	
    $(this).children().last()
                    .val(this.firstChild.textContent)
                    .toggleClass("form-control")
                    .show()
                    .focus();
});

$('.blur').blur(function () {
    "use strict";
    $(this)
        .hide()
        .toggleClass("form-control");
    var myid = (this).id;
    this.parentNode.firstChild.style.display = "inline";
	 this.parentNode.firstChild.textContent= $(this).val();
       
        
});
$('#addbtn').click(function(){
    var brand=$('#brand').val();
	var country=$('#country').val();
	var size = $('#size').val();
	var qty = $('#qty').val();
	var price =$('#price').val();
	var ttype = $('#ttype').val();
	var tid = $('#index').val();
	var ttype=$('#ttype').val();
	//alert(tid);
	$.ajax({
		url: "modal/add.php",
		method: "POST",
		data: ({country:country,brandname:brand,tyresize:size,qty:qty,unitprize:price,tid:tid,ttype:ttype}),
		success: function(data) {
			alert(data);
			// body...

		}

	});
		
	});  
$('.Delete').click(function(){

	var row=this.parentElement.parentElement;
	var tid=parseInt(row.getAttribute('id'));
	//alert(tid);
		
		$.ajax({
			url: "modal/deletestock.php",
			method: "POST",
			data: ({tid:tid}),
			success: function(data) {
				alert(data);
				// body...
				//row.append;
			}
			
		});
	
	
	
	
});
$('.updatebtn').click(function(){
	var index=this.parentNode.parentNode.firstChild.innerHTML;
	var fname=this.parentNode.parentNode.firstChild.nextSibling.firstChild.innerHTML;
	var lname=this.parentNode.parentNode.firstChild.nextSibling.nextSibling.firstChild.innerHTML;
	var tel=this.parentNode.parentNode.firstChild.nextSibling.nextSibling.nextSibling.firstChild.innerHTML;
	$.ajax({
		type:"post",
		url:"",
		data:{index:index,fname:fname,lname:lname,tel:tel},
		success:function(data){
			if($('#alert')!=null){
							$('#alert').remove();
						}
						if(data=="success"){
							$("<div id=\"alert\" class=\"alert alert-success col-md-10 col-md-offset-1\"><strong>Success!</strong>Student Successfully updated</div>").insertAfter('#tablehedding');
							window.scrollTo(0,0);
							
						}
						else{
						$("<div id=\"alert\" class=\"alert alert-danger col-md-10 col-md-offset-1\"><strong>Error!</strong>"+data+"</div>").insertAfter('#tablehedding');
							window.scrollTo(0,0);
						}
		
	}
		
	});
	
});		
</script>	
<style>
		.blur{
			display: none
		}
	.label-default{
		font-size:14px;
	}
	</style>
<script src="../../js/bootstrap-confirmation.min.js"></script>	
<script src="../../js/confirmation.js"></script>	