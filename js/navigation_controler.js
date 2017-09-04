//initial content
document.addEventListener("DOMContentLoaded", function(event) { 
 $('#content-wrapper').load('dashbord.php');
});
//navigate to other pages
$('ul#sidebar-menu li ul li a').click(function(){
		var page=$(this).attr('name');
		$('ul#sidebar-menu li').removeClass("active");
		$(this).parent().parent().parent().addClass("active");
		$('#content-wrapper').load(page+'.php');
	});

//navigate to dashbord
$('#dd').click(function(){
	$('ul#sidebar-menu li').removeClass("active");
	$(this).addClass("active");
	$('#content-wrapper').load('dashbord.php');
});

// dashbord control
function dashbordcontrol(page){
	$('ul#sidebar-menu li').removeClass("active");
	$('#content-wrapper').load(page+'.php');
}
