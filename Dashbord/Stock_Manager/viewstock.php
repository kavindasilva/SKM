<head>
	<?php include '../../assets/success.php'?>  
	<link href="../../css/aos.css" rel="stylesheet">
    <script src="../../js/plugins.js"></script>
      <!-- bootstrap slider -->
  <link rel="stylesheet" href="../../css/slider.css">
</head>
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
        <div class="well filters" data-aos="flip-down">
	<strong ><h4><i class="fa fa-filter"  aria-hidden="true">   Filters</i></h4></strong></br>
       <form class="form-inline">
       <label>Country:&nbsp;&nbsp;</label>
       	<select id = "searchcountry" class="form-control" >
				<option value="">Select</option>
				<option value="Japan">Japan</option>
				<option value="indunesia">Indonesia</option>
				<option value="Thaiwan">Thaiwan</option>
		</select>
      	<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Brand:&nbsp;&nbsp;</label>
      	<select id = "searchbrand" class="form-control" >
      			<option value="">Select</option>
				<option value="Dunlop">Dunlop</option>
				<option value="Kaizen">Kaizen</option>

		</select>
      	<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tire Size:&nbsp;&nbsp;</label>
      	<select id="searchtiresie"  class="form-control"><option value="">Select</option></select>
      	<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quantity Range:</label>
      	<div class="col-md-4 pull-right">
      	
      	<input type="text" value="" id="stockrange" class="slider form-control" data-slider-min="0" data-slider-max="200"
                         data-slider-step="5" data-slider-value="[0,200]" data-slider-orientation="horizontal"
                         data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
			</br></br> <!-- by clicking on this button stock will show accroding to filters-->
			<button class="col-xs-3 col-md-3 btn btn-primary pull-right" type="button" onClick="searchstock();"> <i class="fa fa-search" aria-hidden="true"></i>
 			Search</button>    
      </div>
      
		 
       </form>
        </div>
         <div  class="col-xs-12 col-md-12" >
          <div class="box">
           <div class="box-body" style="overflow-x:auto;" data-aos="zoom-in-right">
    <table class="table table-hover" id="stocktable">
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

				<option value="Japan">Japan</option>
				<option value="indunesia">Indonesia</option>
				<option value="Thaiwan">Thaiwan</option>
			</select>
		</td>

        <td><select id = "brand" class="form-control" style="width: 100px;">
				<option value="Dunlop">Dunlop</option>
				<option value="Kaizen">Kaizen</option>

			</select>
		</td>
		<td><input id="size"  class="form-control"></td>
        <td><input id="qty" type="number" class="form-control"></td>
        <td><input id="price" type="number" class="form-control"></td>
		<td><input id="tp"  class="form-control" value"Available" placeholder="Available" disabled></td>
		<td><select id="ttype"  class="form-control" style="width: 100px;">
			<option value="car">car</option>
			<option value="4wd">4WD</option>
			<option value="bus">Bus</option>
			<option value="other">Other</option>
		</select></td>
		<td><button class="btn btn-success col-md-10 btn-sm" style="width:100%;" id="addbtn"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;Add</button></td>
	</tr>	
	<?php
		$gettires="SELECT * from tire";
		$tires=mysqli_query($conn,$gettires);
		if($tires){
		while($tire=mysqli_fetch_array($tires)){	
		
		echo"<tr id=\"".$tire['t_id']."\"><td><input value=".$tire['t_id']." style=\"text-align:center\" disabled class=\"form-control\"></td><td class=\"clickMe2\"><span class=\"label label-default \">".$tire['country']."</span>
		<select id=\"textBox2\" class=\"blur\"><option value=\"japan\">Japan</option>
				<option value=\"indunesia\">Indonesia</option>
				<option value=\"Thaiwan\">Thaiwan</option></select></td><td class=\"clickMe2\"><span class=\"label label-default \">".$tire['brand_name']."</span>
        <select id=\"textBox1\" class=\"blur\"><option value=\"Dunlop\">Dunlop</option>
				<option value=\"Kaizen\">Kaizen</option></select>
				</td><td class=\"clickMe\"><span class=\"label label-default \">".$tire['tire_size']."</span>
        <input id=\"textBox3\" class=\"blur\"></td><td class=\"clickMe\"><span class=\"label label-default \">".$tire['quantity']."</span>
        <input id=\"textBox4\" class=\"blur\"></td><td class=\"clickMe\"><span class=\"label label-default \">".$tire['unit_price']."</span>
        <input id=\"textBox5\" class=\"blur\"></td><td class=\"clickMe\"><span class=\"label label-default \">".$tire['status']."</span>
        <input id=\"textBox6\" class=\"blur\"></td><td class=\"clickMe2\"><span class=\"label label-default \">".$tire['t_type']."</span>
        <select id=\"textBox7\" class=\"blur\"><option value=\"car\">car</option>
			<option value=\"4wd\">4WD</option>
			<option value=\"bus\">Bus</option>
			<option value=\"other\">Other</option></select></td><td><a href=\"#\" class=\"delete\" data-singleton=\"true\" data-toggle=\"confirmation-popout\" data-placement=\"top\" title=\"Delete this stock item?\" onclick=\"setelement(this);\"><i class=\"fa fa-trash \" aria-hidden=\"true\" style=\"font-size: 22px;\"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick=\"updatestock(this);\" href=\"#\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Save\"><i class=\"fa fa-floppy-o\" aria-hidden=\"true\" style=\"font-size: 22px;\"></i></a></td></tr>";
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
var deletingrow; 
function setelement(element){
	deletingrow=element;
}
function searchstock(){
	var tbody1=document.getElementById('stocktable').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
	var country=$('#searchcountry').val();
	var brand=$('#searchbrand').val();
	var tiresize=$('#searchtiresie').val();
	var stockrange=document.getElementById('stockrange').value;
	stockrange=stockrange.split(",");
	$('#stocktable tbody tr').show();
	if(country!=""){
	for(var i=1;i<tbody1.length;i++){
		
		if(tbody1[i].getElementsByTagName('td')[1].firstChild.innerHTML==country){
			continue;
		}
		tbody1[i].style.display = "none";
	}
	}
	if(brand!=""){
	for(var i=1;i<tbody1.length;i++){
		
		if(tbody1[i].getElementsByTagName('td')[2].firstChild.innerHTML==brand){
			continue;
		}
		tbody1[i].style.display = "none";
	}
	}
	if(tiresize!=""){
	for(var i=1;i<tbody1.length;i++){
		
		if(tbody1[i].getElementsByTagName('td')[3].firstChild.innerHTML==tiresize){
			continue;
		}
		tbody1[i].style.display = "none";
	}
	}
	if(stockrange!=""){
		
	for(var i=1;i<tbody1.length;i++){
		//alert(parseInt(tbody1[i].getElementsByTagName('td')[4].firstChild.innerHTML));
		if(parseInt(stockrange[0])<=parseInt(tbody1[i].getElementsByTagName('td')[4].firstChild.innerHTML) && parseInt(stockrange[1])>=parseInt(tbody1[i].getElementsByTagName('td')[4].firstChild.innerHTML)){
			continue;
		}
		
		tbody1[i].style.display = "none";
	}
	}

}	
	
$('.clickMe').click(function () {
    "use strict";
    this.firstChild.style.display = "none";
	
    $(this).children().last()
                    .val(this.firstChild.textContent)
                    .toggleClass("form-control")
                    .show()
                    .focus();
});
$('.clickMe2').click(function () {
    "use strict";
    this.firstChild.style.display = "none";
	
    $(this).children().last()
                    //.toggleClass("form-control")
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
			
			document.getElementById('message').innerHTML="New stock item added successfully";
					   $('#modal-success').modal('show');

		}

	});
	$('#content-wrapper').load('viewstock.php');	
	});  
function deletestock(){

	var row=deletingrow.parentElement.parentElement;
	var tid=parseInt(row.getAttribute('id'));
	//alert(tid);
		
		$.ajax({
			url: "modal/deletestock.php",
			method: "POST",
			data: ({tid:tid}),
			success: function(data) {
			document.getElementById('message').innerHTML="Stock item Deleted";
					   $('#modal-success').modal('show');
				
			}
			
		});
	
	$('#content-wrapper').load('viewstock.php');
	
	
}
function updatestock(element){
	//var index=this.parentNode.parentNode.firstChild.innerHTML;
	var row=element.parentNode.parentNode.getElementsByTagName('td');
	var tid=element.parentNode.parentNode.getAttribute('id');
	var country=row[1].firstChild.innerHTML;
	var brand=row[2].firstChild.innerHTML;
	var tsize=row[3].firstChild.innerHTML;
	var qty=row[4].firstChild.innerHTML;
	var up=row[5].firstChild.innerHTML;
	var status=row[6].firstChild.innerHTML;
	var ttype=row[7].firstChild.innerHTML;
	
	$.ajax({
		type:"post",
		url:"modal/updatestock.php",
		data:{tid:tid,country:country,brand:brand,tsize:tsize,qty:qty,up:up,status:status,ttype:ttype},
		success:function(data){
			document.getElementById('message').innerHTML="Stock successfully updated";
					   $('#modal-success').modal('show');
	}
		
	});
	
}
function showsize(){//auto loading tire sizes
	$('#searchtiresie').children('option:not(:first)').remove();
	var b=document.getElementById('searchbrand').value;
	var c=document.getElementById('searchcountry').value;
	$.ajax({
				type:"post",
				url:"assets/loadsize.php",
				data:({brand:b,country:c}),
				success:function(data){	
					var result=data.split(" ");
					for(i in result){	
					$('#searchtiresie').append("<option value=\""+result[i]+"\">"+result[i]+"</option>");
					}
				}
					
			});
}
$('#searchcountry').on('change',showsize);
$('#searchbrand').on('change',showsize);
</script>	
<style>
		.blur{
			display: none
		}
	.label-default{
		font-size:14px;
	}
	</style>
   <script>
    AOS.init();
 </script>
 <script>
  $(function () {
    /* BOOTSTRAP SLIDER */
    $('.slider').slider();
   
    
  });
</script>
 <script src="../../js/bootstrap-slider.js"></script>
<script src="../../js/bootstrap-confirmation.min.js"></script>	
<script src="../../js/confirmation.js?v=2"></script>	