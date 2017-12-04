
//document.write("Validation script insert");

function validateTel(){
	var inputtxt= document.getElementById("telp").value; //alert(inputtxt);
	var phoneno = /^[0-9]+$/;
	//var phoneno=/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
	//value.match(/\d/g).length===10;
  	//if(value.match(/\d/g).length===10){
  	if(inputtxt.match(phoneno)){
  		//alert("Dd");
  		document.getElementById("telp").style.color='green';
    	return true;
    }
    else
    {
        //alert("message");
        document.getElementById("telp").style.color='red';
        return false;
    }
}

