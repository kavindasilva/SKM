
	
	$('ul#sidebar-menu li li a').click(function(){
		var page=$(this).attr('name');
		alert(page);
		$('#content-wrapper').load(page+'.php');
	});
