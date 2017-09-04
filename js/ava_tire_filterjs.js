$(document).ready(function(){
		$("select#brand").on('change',function(){
			var value=$(this).val();
			$.ajax({
				url:'ava_tire_filtering.php',
				type:'POST',
				data:'request1='+value,
				beforeSend:function(){
					$("table#tire_ava tbody").html('Working on...');
				},
				success:function(data){
					$("table#tire_ava tbody").html(data);
				},
			});
		});
//		$("select#country").on('change',function(){
//			var value=$(this).val();
//			$.ajax({
//				url:'ava_tire_filtering.php',
//				type:'POST',
//				data:'country='+value,
//				beforeSend:function(){
//					$("table#tire_ava tbody").html('Working on...');
//				},
//				success:function(data){
//					$("table#tire_ava tbody").html(data);
//					},
//			});
//		});
	});