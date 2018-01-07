
//document.write("Validation script insert");

function validateTel(){
	var inputtxt= document.getElementById("telp").value; //alert(inputtxt);
	var phoneno = /^[0-9]+$/;
	//var phoneno=/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
	//value.match(/\d/g).length===10;
  	//if(value.match(/\d/g).length===10){
		/*
  	if( (inputtxt.length==10  || inputtxt=="" )  ){
  		//alert("Dd");
  		if(inputtxt.match(phoneno)){
			document.getElementById("telp").style.color='green';
			enableBTN2();
			return true;
		}
		else{
			document.getElementById("telp").style.color='red';
			disableBTN2();
			return false;
		}
    }*/
	if( (inputtxt.length==10  && inputtxt.match(phoneno) )  ){
  		//alert("Dd");
		document.getElementById("telp").style.color='green';
		enableBTN2();
		return true;
	}
    else
    {
        //alert("message");
        document.getElementById("telp").style.color='red';
		disableBTN2();
        return false;
    }
}


function disableBTN2(){
    //$("#subk").attr("disabled","disabled");
    $("#subk").prop('disabled', true);
}
function enableBTN2(){
    //$("#subk").removeAttr("disabled");
    $("#subk").prop('disabled', false);
}