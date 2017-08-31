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
				url:"assets/checkavailability.php",
				data:({brand:x,country:y,tiresize:z}),
				success:function(qty){	
				intq=parseInt(q);
				qty=parseInt(qty);
					if(intq>qty){
						$('.modal-warning').modal('show');
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
			});
			
			
		}
	}
function prceedanyway(){
		x=document.getElementById('brand').value;
		y=document.getElementById('country').value;
		z=document.getElementById('tiresize').value;
		q=document.getElementById('quantity').value;
	
		$.ajax({
							type:"post",
							url:"assets/loadinvoiceitem.php",
							data:({brand:x,country:y,tiresize:z}),
							success:function(data){
				 			$('#orderitems').append("<tr style=\"color: red;\" class=\"removable\"><td><input type=checkbox></td><td>" + x+ "</td><td>" + y + "</td><td>" + z + "</td><td>" + data + "</td><td>" + q + "</td><td>" + data*q + "</td></tr>");
							validate.sum+=data*q;
							updatedata();
												}	
							});
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
		$("#subtotal").html(validate.sum);
	}
	function a(){
	//$('#maininvoiceform').on('submit',function(){
	
		var tot=document.getElementById('subtotal').textContent;
		var shopname=document.getElementById('shopname').value;
		var comname=document.getElementById('companyname').value;
		var rows = document.getElementById('orderitems').getElementsByTagName('tbody')[0].getElementsByTagName('tr').length;
		if(shopname==""&&comname==""){
			$('.modal-danger').modal('show');
		}
		else if(rows==0){
			
			$('#modal-noowner').modal('show');
		}
		else{
	  $.ajax({
		  type:"post",
		  url:"controler/cusordercontroler.php",
		  data:({total:tot,shopname:shopname,comname:comname}),
		  success:function(data){
			  alert(data);
		  }
	  });
		}
	}//);
	
	$('#discount').on('change',function(){
		updatedata();
	});	
$('#shopname').on('change',function(){
if($('#shopname').value!=""){
	document.getElementById("companyname").selectedIndex = "0";	
}	
		}); 	

$('#companyname').on('change',function(){
if($('#companyname').value!=""){
	document.getElementById("shopname").selectedIndex = "0";	
}	
		}); 
function showsize(){
	$('#tiresize').children('option:not(:first)').remove();
	var b=document.getElementById('brand').value;
	var c=document.getElementById('country').value;
	$.ajax({
				type:"post",
				url:"assets/loadsize.php",
				data:({brand:b,country:c}),
				success:function(data){	
					var result=data.split(" ");
					for(i in result){	
					$('#tiresize').append("<option value=\""+result[i]+"\">"+result[i]+"</option>");
					}
				}
					
			});
}
$('#brand').on('change',showsize);
$('#country').on('change',showsize);
