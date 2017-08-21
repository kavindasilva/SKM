//admin functions
//document.write("JS is ok<BR>");
function searchRows(trindex, eleid, tableid) {//tr index, element id
	//alert(trindex); working
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

function confirmD() {
	var x = confirm("Are you sure you want to delete?");
	if (x)
		return true;
	else
		return false;
}

function confirmU() {
	var x = confirm("Do you really want to update?");
	if (x)
		return true;
	else
		return false;
}

function confirmI(){
	var x = confirm("Click OK to confirm the entry");
	if (x)
		return true;
	else
		return false;

}

function redirectMain(){
	//window.open('index.php');
	//window.location.href("index.php");
	window.location="index.php";
}

function clearAllStd() {
	document.getElementById("search1").value = "";
	document.getElementById("search2").value = "";
	document.getElementById("search3").value = "";
	document.getElementById("search4").value = "";

	searchRows(0, 'search1', 'tblstd');
}

function clearAllTch() {
	document.getElementById("search11").value = "";
	document.getElementById("search12").value = "";
	document.getElementById("search13").value = "";
	document.getElementById("search14").value = "";

	searchRows(0, 'search11', 'tbltch');
}
