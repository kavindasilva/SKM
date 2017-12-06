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
     <section class="content ">
         <div  class="col-xs-12 col-md-12" style="width: auto; margin-right: 10px;">
          <div class="box" >
           <div class="box-body" >
    <table class="table table-hover" id="studentsdetails">
	<thead>
		<tr>
			<th>Index Nubmer</th>
			<th>country</th>
			<th>Tire Size</th>
			<th>Brand Name</th>
            <th>qty</th>
            <th>unit price</th>
            <th>status</th>
            <th> </th>
		</tr>
	</thead>
	<tbody>
	<tr>
		<td><input id="index" class="form-control" disabled></td>
		<td><input id="fname"  class="form-control"></td>
		<td><input id="lname"  class="form-control"></td>
        <td><input id="fname"  class="form-control"></td>
        <td><input id="fname"  class="form-control"></td>
        <td><input id="fname"  class="form-control"></td>
		<td><input id="tp"  class="form-control" value"Available" placeholder="Available" disabled></td>
		<td><button class="btn btn-success col-md-10 btn-sm" style="width:100%;" id="addbtn"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;Add</button></td>
	</tr>
	<?php
		$gettires="SELECT * from tire";
		$tires=mysqli_query($conn,$gettires);
		if($tires){
		while($tire=mysqli_fetch_array($tires)){	
		
		echo"<tr id=\"".$tire['t_id']."\"><td>".$tire['t_id']."</td><td class=\"clickMe\"><span class=\"label label-default \">".$tire['country']."</span>
        <input id=\"textBox1\" class=\"blur\"></td><td class=\"clickMe\"><span class=\"label label-default \">".$tire['tire_size']."</span>
        <input id=\"textBox1\" class=\"blur\"></td><td class=\"clickMe\"><span class=\"label label-default \">".$tire['brand_name']."</span>
        <input id=\"textBox1\" class=\"blur\"></td><td class=\"clickMe\"><span class=\"label label-default \">".$tire['quantity']."</span>
        <input id=\"textBox1\" class=\"blur\"></td><td class=\"clickMe\"><span class=\"label label-default \">".$tire['unit_price']."</span>
        <input id=\"textBox1\" class=\"blur\"></td><td class=\"clickMe\"><span class=\"label label-default \">".$tire['status']."</span>
        <input id=\"textBox1\" class=\"blur\"></td><td><button class=\"btn btn-warning btn-sm updatebtn\"><i class=\"fa fa-pencil-square\" aria-hidden=\"true\"></i>&nbsp;&nbsp;Update</button>&nbsp;&nbsp;<button data-id=\"".$tire['t_id']."\" class=\"btn btn-danger btn-sm Delete\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i>&nbsp;&nbsp;Delete</button></td></tr>";
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
	alert("addbutton");
		
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
				//alert(data);
				// body...
				row.remove();
			}
			
		});
	
	
	
	
});
$('.updatebtn').click(function(){
	alert("updatebtn");
	
});		
</script>	
<style>
		.blur{
			display: none
		}
	</style>