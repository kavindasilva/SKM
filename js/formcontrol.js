//bootstrap tool tip
$('[data-toggle="tooltip"]').tooltip();   

function validate(){
		x=document.getElementById('brand').value;
		y=document.getElementById('country').value;
		z=document.getElementById('tiresize').value;
		q=document.getElementById('quantity').value;
		if(x=="" || y=="" || z=="" || q=="")
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
				 			$('#orderitems').append("<tr class=\"removable\"><td>" + x+ "</td><td>" + y + "</td><td>" + z + "</td><td>" + data + "</td><td>" + q + "</td><td>" + data*q + "</td><td>Available</td><td><a href=\"#\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Remove this item\"><i class=\"fa fa-trash\" aria-hidden=\"true\" style=\"font-size: 20px;\"></i></a></td><td><a href=\"#\" onclick=\"showmodal();\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Edit quantity\"><i class=\"fa fa-pencil-square\" aria-hidden=\"true\" style=\"font-size: 20px;\"></i></a></td></tr>");
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
// this is not working check
$('#orderitems tbody tr td a i').click(function(){
	alert("fdf");
});
function showmodal(){
	$('#newquantity').val("");
	$('#updatequantitymodal').modal('show');
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

/*function removeselected(){
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
}*/
function placeorder(){
	//$('#maininvoiceform').on('submit',function(){
	
		var tot=document.getElementById('subtotal').textContent;
		var shopname=document.getElementById('shopname').value;
		var sordno=$("#sordnodisplay").val();
		
		var rows = document.getElementById('orderitems').getElementsByTagName('tbody')[0].getElementsByTagName('tr').length;
	
		if(shopname==""){
			$('#missingfieldmodal').modal('show');
		}
		else if(rows==0){
			
			$('#modal-noowner').modal('show');
		}
		else{
	  $.ajax({
		  type:"post",
		  url:"controler/cusordercontroler.php",
		  data:({total:tot,shopname:shopname,comname:shopname,sordno:sordno}),
		  success:function(data){
			
		
		  }
	  });
			var rowarray=document.getElementById('orderitems').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
			for(var i=0;i<rows;i++){
				brand=rowarray[i].getElementsByTagName('td')[0].innerHTML;
				country=rowarray[i].getElementsByTagName('td')[1].innerHTML;
				tiresize=rowarray[i].getElementsByTagName('td')[2].innerHTML;
				qty=rowarray[i].getElementsByTagName('td')[4].innerHTML;
				status=rowarray[i].getElementsByTagName('td')[6].innerHTML;
			$.ajax({
				  type:"post",
				  url:"controler/cusorderitemcontroler.php",
				  data:({brand:brand,country:country,tiresize:tiresize,qty:qty,status:status,sordno:sordno}),
				  success:function(data){
					   document.getElementById('message').innerHTML="Your order successfully placed"
					   $('#modal-success').modal('show');
					   $(".table-bordered  .removable").remove();
					   document.getElementById("shopname").selectedIndex =0;
					   validate.sum=0;
					   $("#sordnodisplay").val(parseInt($("#sordnodisplay").val())+1);
					   updatedata();
			 
		  							}
	  });
				
			}
		}
	}//);
	
$('#discount').on('change',function(){
		updatedata();
	});	
/*$('#shopname').on('change',function(){
if($('#shopname').value!=""){
	document.getElementById("companyname").selectedIndex = "0";	
}	
		}); */	

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

function sendRequesition(){//this handls the new quotation request data insertion
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
		  success:function(data1){
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
					   alert(data);
			 
		  							}
	  });
				
			}
			 
		  }
	  });
						document.getElementById('message').innerHTML="Your Quotation request successfully sent. Our agent will reply you soon";
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
$('#tablebody table tbody tr td button').click(function(){
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
//filter orders by name and date range 
$('#searchord').click(function(){

	var dcname=document.getElementById('shopname').value;
	var tbody1=document.getElementById('foundorders').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
	var dateFrom = $('#fromdate').val();
	var dateTo = $('#todate').val();
	$('#foundorders tbody tr').show();
	
	if(dateFrom!=""){
		var d1 = dateFrom.split("/");
		
		var from = new Date(d1[2], parseInt(d1[0])-1, d1[1]);  // -1 because months are from 0 to 1
		
		for(var i=0;i<tbody1.length;i++){
		var dateCheck = tbody1[i].getElementsByTagName('td')[2].innerHTML;
	    dateCheck = dateCheck.trim();	
		var c = dateCheck.split("-");
		var check = new Date(c[0], parseInt(c[1])-1, c[2]);
		if(check >= from){
			continue;
		}
		tbody1[i].style.display = "none";
	}

	}
	if(dateTo!=""){
		var d2 = dateTo.split("/");
		
		var to = new Date(d2[2], parseInt(d2[0])-1, d2[1]);  // -1 because months are from 0 to 1
		
		for(var i=0;i<tbody1.length;i++){
		var dateCheck = tbody1[i].getElementsByTagName('td')[2].innerHTML;
		var c = dateCheck.split("-");
		var check = new Date(c[0], parseInt(c[1])-1, c[2]);

		if(check <= to){
			continue;
		}
		tbody1[i].style.display = "none";
	}

	}
	if(dcname!=""){
	for(var i=0;i<tbody1.length;i++){
		
		if(tbody1[i].getElementsByTagName('td')[1].innerHTML==dcname){
			continue;
		}
		tbody1[i].style.display = "none";
	}
	}
	
	
});