//admin functions
/**
	Table filter function
	Confirm delete
	Confirm update
	Confirm insert
	
	check password matching(change password)
	Clear search boxes
*/

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

function chkPass(){
	var p1 = document.getElementById("pass1").value;
	var p2 = document.getElementById("pass2").value;
	
	if(p1 ==p2)
		return true;
	else{
		alert("password confirmation failed. Try again");
		return false;
	}
	
}

/*
	This function is used to clear the search values
	table ID is passed. then all the results are displayed in the relevant table, after clearing search boxes
*/
function clearAll(tblID) {
	document.getElementById("search1").value = "";
	document.getElementById("search2").value = "";
	document.getElementById("search3").value = "";
	document.getElementById("search4").value = "";
	//document.getElementById("search5").value = "";

	//searchRows(0, 'search1', 'tblcus');
	searchRows(0, 'search1', tblID);
	//searchRows(0, 'search1', 'tbldealer');
	//searchRows(0, 'search1', 'tblsup');
}

function clearAllTch() {
	document.getElementById("search11").value = "";
	document.getElementById("search12").value = "";
	document.getElementById("search13").value = "";
	document.getElementById("search14").value = "";

	searchRows(0, 'search11', 'tbltch');
}
