
	
	$('ul#sidebar-menu li li a').click(function(){
		var page=$(this).attr('name');
		
		$('#content-wrapper').load(page+'.php');
	});
