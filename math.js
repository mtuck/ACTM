

//Martin Tuck, Amy Brown, Stephen Mardis actm javascript






function hidestuff(){
	document.getElementById("Sponsor2").style.display = "none";
	document.getElementById("Sponsor3").style.display = "none";
	document.getElementById("Sponsor4").style.display = "none";
	document.getElementById("otherInfo").style.display = "none";
	document.getElementById("divisionTable").style.display = "none";
}

function showDivs(){
	document.getElementById("divisionTable").style.display = "block";

}





function otherSchool(name){
	
	if(name.value=="Other")
		document.getElementById("otherInfo").style.display = "block";
	else
		document.getElementById("otherInfo").style.display = "none";
}






$(document).ready(function(){
    $('#profileForm').bootstrapValidator();
});






function isValNum(item){
	var elem = document.getElementById(item);
	var num = Number(elem.value);
	if(num < 0 || num > 99){
		num = 0;
		elem.value = 0;
		
	}
	
	var compTotal = (Number(document.getElementById("compEnt").value)*5);
	var trigTotal = (Number(document.getElementById("trigEnt").value)*5);
	var geomTotal = (Number(document.getElementById("geomEnt").value)*5);
	var total = compTotal + trigTotal + geomTotal;
	
	total.toFixed(2);
	document.getElementById("compTot").value = "$" + compTotal;
	document.getElementById("trigTot").value = "$" + trigTotal;	
	document.getElementById("geomTot").value = "$" + geomTotal;
	document.getElementById("total").value = "$" + (total+10);
	

	
		
}









$.getJSON('list.php',function(list){
var tags = list;
$( "#autocomplete" ).autocomplete({
source: function( request, response ) {
var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
response( $.grep( tags, function( item ){
return matcher.test( item );
}) );
}
});
});

	
$( "#autocomplete" ).keyup(function(){
	});







function addSponsor(){
	if(document.getElementById("Sponsor2").style.display == "none"){
		document.getElementById("Sponsor2").style.display = "block";
		return;
	}
	
	if(document.getElementById("Sponsor3").style.display == "none"){
		document.getElementById("Sponsor3").style.display = "block";
		return;
	}
	
	if(document.getElementById("Sponsor4").style.display == "none"){
		document.getElementById("Sponsor4").style.display = "block";
		document.getElementById("addButton").style.display = "none";

	
		return;
	}
}






