
/**
	Table filter function
	Clear search boxes
*/

document.write("JS is ok<BR>");
function searchRows(trindex, eleid, tableid) {//tr index, element id
	//alert(trindex); //working
	// Declare variables
	var input,
	    filter,
	    table,
	    tr,
	    td,
	    i,
	    tindex;
	//input = document.getElementById("myInput");
	input = document.getElementById(eleid);
	
	//var vivainput=document.getElementById('myInput').value;
	var vivainput=document.getElementById(eleid).value;
	alert(vivainput);
	
	
	filter = input.value.toUpperCase();
	//key word to uppercase

	table = document.getElementById(tableid);
	tr = table.getElementsByTagName("tr");
	//table row

	// Loop through all table rows, and hide those who don't match the search query
	for ( i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[trindex];
		//tr index
		//td = tr[i].getElementsByTagName("td")[0]; //tr index
		if (td) {//if there is a td
			if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {//if strings are matched
				tr[i].style.display = "";
			} else {
				tr[i].style.display = "none";
			}
		}
	}
}

function searchRows2(trindex, keyval, tableid) {//tr index, key value
	var input,filter,table,tr,td,i,tindex;
	
	//var vivainput=document.getElementById('myInput').value;
	//alert(vivainput);

	input = keyval;
	filter = input.toUpperCase();

	table = document.getElementById(tableid);
	tr = table.getElementsByTagName("tr");

	for ( i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[trindex];
		if (td) {//if there is a td
			if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {//if strings are matched
				tr[i].style.display = "";
			} else {
				tr[i].style.display = "none";
			}
		}
	}
}

