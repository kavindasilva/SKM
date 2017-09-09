function validate(){
		x=document.getElementById('brand').value;
		y=document.getElementById('country').value;
		z=document.getElementById('tiresize').value;
		q=document.getElementById('quantity').value;
		if(x=="" ||y==""||z==""||q=="")
			{
				$('#missingfieldmodal').modal('show');
				 
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
				 			$('#orderitems').append("<tr class=\"removable\"><td><input type=checkbox></td><td>" + x+ "</td><td>" + y + "</td><td>" + z + "</td><td>" + data + "</td><td>" + q + "</td><td>" + data*q + "</td><td>Available</td></tr>");
							validate.sum+=data*q;
							updatedata();
							document.getElementById('brand').selectedIndex=0;
							document.getElementById('country').selectedIndex=0;
							document.getElementById('tiresize').selectedIndex=0;
							document.getElementById('quantity').value="";
								
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
				 			$('#orderitems').append("<tr style=\"background-color: #FFB2B3\" class=\"removable\"><td><input type=checkbox></td><td>" + x+ "</td><td>" + y + "</td><td>" + z + "</td><td>" + data + "</td><td>" + q + "</td><td>" + data*q + "</td><td>Unavailable</td></tr>");
							validate.sum+=data*q;
							updatedata();
							document.getElementById('brand').selectedIndex=0;
							document.getElementById('country').selectedIndex=0;
							document.getElementById('tiresize').selectedIndex=0;
							document.getElementById('quantity').value="";
								
												}	
							});
}

validate.sum=0;

function updatedata(){
				$("#subtotal").html(validate.sum);
				/*var discount=validate.sum*document.getElementById('discount').value;	
				$("#dis").html(discount);
				var netamount=validate.sum-discount;
				$("#net").html(netamount);	*/
	}
	
function removeall(){

		validate.sum=0;
		$(".table-bordered  .removable").remove();
		updatedata();
	}

function removeselected(){
	var rows = document.getElementById('orderitems').getElementsByTagName('tbody')[0].getElementsByTagName('tr').length;
	for(var i=0;i<rows;i++){
		var targetelement=document.getElementById('orderitems').getElementsByTagName('tbody')[0].getElementsByTagName('tr')[i].getElementsByTagName('td')[0].firstChild;
		var checkstatus=targetelement.checked;
		var remtot=targetelement.parentElement.parentElement.getElementsByTagName('td')[4].innerHTML;
		validate.sum=validate.sum-remtot;
		if(checkstatus){
			document.getElementById('orderitems').getElementsByTagName('tbody')[0].getElementsByTagName('tr')[i].remove();
		}
		updatedata();
	}
}
function placeorder(){
	//$('#maininvoiceform').on('submit',function(){
	
		var tot=document.getElementById('subtotal').textContent;
		var shopname=document.getElementById('shopname').value;
		var comname=document.getElementById('companyname').value;
		var rows = document.getElementById('orderitems').getElementsByTagName('tbody')[0].getElementsByTagName('tr').length;
		if(shopname==""&&comname==""){
			$('#missingfieldmodal').modal('show');
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
			
			 
		  }
	  });
			var rowarray=document.getElementById('orderitems').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
			for(var i=0;i<rows;i++){
				brand=rowarray[i].getElementsByTagName('td')[1].innerHTML;
				country=rowarray[i].getElementsByTagName('td')[2].innerHTML;
				tiresize=rowarray[i].getElementsByTagName('td')[3].innerHTML;
				qty=rowarray[i].getElementsByTagName('td')[5].innerHTML;
				status=rowarray[i].getElementsByTagName('td')[7].innerHTML;
			$.ajax({
				  type:"post",
				  url:"controler/cusorderitemcontroler.php",
				  data:({brand:brand,country:country,tiresize:tiresize,qty:qty,status:status}),
				  success:function(data){
					  
					   $('#modal-success').modal('show');
					   $(".table-bordered  .removable").remove();
					   document.getElementById("shopname").selectedIndex = "0";
					   document.getElementById("companyname").selectedIndex = "0";
					   document.getElementById('brand').selectedIndex=0;
					   document.getElementById('country').selectedIndex=0;
					   document.getElementById('tiresize').selectedIndex=0;
					   document.getElementById('quantity').value="";
					   validate.sum=0;
					   updatedata();
			 
		  							}
	  });
				
			}
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

function customerplaceorder(){
	
		var tot=document.getElementById('subtotal').textContent;
		var rows = document.getElementById('orderitems').getElementsByTagName('tbody')[0].getElementsByTagName('tr').length;
		if(rows==0){
			
			$('#modal-noowner').modal('show');
		}
		else{
	  $.ajax({
		  type:"post",
		  url:"controler/cusorderbycuscontroler.php",
		  data:({total:tot}),
		  success:function(data){
			 
			 
		  }
	  });
			var rowarray=document.getElementById('orderitems').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
			for(var i=0;i<rows;i++){
				brand=rowarray[i].getElementsByTagName('td')[1].innerHTML;
				country=rowarray[i].getElementsByTagName('td')[2].innerHTML;
				tiresize=rowarray[i].getElementsByTagName('td')[3].innerHTML;
				qty=rowarray[i].getElementsByTagName('td')[5].innerHTML;
				status=rowarray[i].getElementsByTagName('td')[7].innerHTML;
			$.ajax({
				  type:"post",
				  url:"controler/cusorderbycusitemcontroler.php",
				  data:({brand:brand,country:country,tiresize:tiresize,qty:qty,status:status}),
				  success:function(data){
					 
					  alert(data);
			 
		  							}
	  });
				
			}
			 			$('#modal-success').modal('show');
					   $(".table-bordered  .removable").remove();
					   document.getElementById("shopname").selectedIndex = "0";
					   document.getElementById("companyname").selectedIndex = "0";
					   document.getElementById('brand').selectedIndex=0;
					   document.getElementById('country').selectedIndex=0;
					   document.getElementById('tiresize').selectedIndex=0;
					   document.getElementById('quantity').value="";
					   validate.sum=0;
					   updatedata();
		}
	
}

function validatequotation(){
		x=document.getElementById('brand').value;
		y=document.getElementById('country').value;
		z=document.getElementById('tiresize').value;
		q=document.getElementById('quantity').value;
		if(x=="" ||y==""||z==""||q=="")
			{
				$('#missingfieldmodal').modal('show');
				 
			}
		else{
			$('#orderitems').append("<tr class=\"removable\"><td><input type=checkbox></td><td>" + x+ "</td><td>" + y + "</td><td>" + z + "</td><td>" + q + "</td></tr>");

		}
	}

function sendRequesition(){
		var note = document.getElementById('qnote').value;
		
		var rows = document.getElementById('orderitems').getElementsByTagName('tbody')[0].getElementsByTagName('tr').length;
		if(rows==0){
			
			$('#modal-noowner').modal('show');
		}
		else{
	  $.ajax({
		  type:"post",
		  url:"controler/quotationheadercontroler.php",
		  data:({note:note}),
		  success:function(data){
			alert(data);
			 
		  }
	  });
			var rowarray=document.getElementById('orderitems').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
			for(var i=0;i<rows;i++){
				brand=rowarray[i].getElementsByTagName('td')[1].innerHTML;
				country=rowarray[i].getElementsByTagName('td')[2].innerHTML;
				tiresize=rowarray[i].getElementsByTagName('td')[3].innerHTML;
				qty=rowarray[i].getElementsByTagName('td')[4].innerHTML;
				
			$.ajax({
				  type:"post",
				  url:"controler/quotationdetailcontroler.php",
				  data:({brand:brand,country:country,tiresize:tiresize,qty:qty}),
				  success:function(data){
					  // alert(data);
			 
		  							}
	  });
				
			}
					   $('#modal-success').modal('show');
					   $(".table-bordered  .removable").remove();
					   document.getElementById('brand').selectedIndex=0;
					   document.getElementById('country').selectedIndex=0;
					   document.getElementById('tiresize').selectedIndex=0;
					   document.getElementById('quantity').value="";
					   document.getElementById('qnote').value="";
		}
}
//this handls the action button control of the low stock table
$('#tablebody table tbody tr td :first-child').click(function(){
	$(this).html('<i class="fa fa-check-circle" style="font-size: 18px;" aria-hidden="true"></i>');
	var row=$(this).parent().parent();
	row.removeClass("backred");
	row.addClass("backgreen");
	
});
//this handls the action button order details control of the low stock table
$('#tablebody table tbody tr td :last-child').click(function(){
	//var row=$(this).parent().parent();
	
	$('#orderdetailsmodal').modal('show');
});