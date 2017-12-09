
//alert("testing ok");

function checkCur(eleId) { //check with current date
	var dat=document.getElementById(eleId).value; //alert(dat);
	var datsplit=dat.split('-');
	var curDay=new Date();
	//var curDaysplit=curDay.split('');
	var cyear=curDay.getFullYear();
	var cmonth=curDay.getMonth()+1;

	//if(datsplit[0]>curDaysplit[0]){ //year checking
	if(datsplit[0]>cyear){ //year checking
		alert("report month cannot be a future month");
		$("#"+eleId+"btn").prop('disabled', true);
		$("#"+eleId+"btn2").prop('disabled', true);
	}
	else if(datsplit[0]==cyear){ //current year
		if(datsplit[1]>cmonth){
			alert("report month should be smaller than current month");
			$("#"+eleId+"btn").prop('disabled', true);
			$("#"+eleId+"btn2").prop('disabled', true);
		}
		else
			$("#"+eleId+"btn").prop('disabled', false);
			$("#"+eleId+"btn2").prop('disabled', false);
	}
	else{
		//alert("sdfsd");
		$("#"+eleId+"btn").prop('disabled', false);
		$("#"+eleId+"btn2").prop('disabled', false);
	}
}



function checkDate(){
	var from = document.getElementById('startm').value;
    var to = document.getElementById('endm').value;

    //Generate an array where the first element is the year, second is month and third is day
    var splitFrom = from.split('-'); //alert(splitFrom);
    var splitTo = to.split('-'); alert(splitTo);

    //Create a date object from the arrays
    //var fromDate = Date.parse(splitFrom[0], splitFrom[1] - 1, splitFrom[2]);
    //var toDate = Date.parse(splitTo[0], splitTo[1] - 1, splitTo[2]);

    //check months
    var fromDate = Date.parse(splitFrom[0], splitFrom[1] );
    var toDate = Date.parse(splitTo[0], splitTo[1] );

    //Return the result of the comparison
    //return fromDate < toDate;
    if(fromDate>toDate){
    	alert("invalid dates");
    }
}

function testAlert(){
	alert("test pass");
}
