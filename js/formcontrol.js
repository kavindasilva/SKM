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
	
	  $.ajax({
		  type:"post",
		  url:"controler/cusordercontroler.php",
		  data:({total:tot,shopname:shopname,comname:comname}),
		  success:function(data){
			  alert(data);
		  }
	  });
	}//);
	
	$('#discount').on('change',function(){
		updatedata();
	});	