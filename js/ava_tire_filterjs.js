$(document).ready(function(){
		$("select#brand").on('change',function(){
			var value=$(this).val();
			$.ajax({
				url:'ava_tire_filtering.php',
				type:'POST',
				data:'request='+value,
				beforeSend:function(){
					$("table#tire_ava tbody").html('Working on...');
				},
				success:function(data){
					$("table#tire_ava tbody").html(data);
				},
			});
		});
	});