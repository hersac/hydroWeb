/*Creacion del display actual*/

/*Mostrar la fecha y hora actual en tiempo real*/
var x=setInterval(function(){

	let today=document.getElementById("today");
	let dateNow=new Date();
	today.innerHTML=dateNow;

}, 500);


/*Mostrar el historial*/
function showHistory(){
	var divHistory=document.getElementById("history");
	divHistory.classList.remove("history");
	divHistory.classList.add("history2");

}

/*Mostrar las graficas*/

var g=0;

function verProgreso(){

	var divGrafics=document.getElementById("progreso");

	if (g==0){
		divGrafics.classList.remove("progreso");
		divGrafics.classList.add("progreso2");
		g=1;
	} else {
		divGrafics.classList.remove("progreso2");
		divGrafics.classList.add("progreso");
		g=0;
	}
}


/*Funcion de regresar*/

function back(){
	var divHistory=document.getElementById("history");
	divHistory.classList.add("history");

	var divGrafics=document.getElementById("progreso");
	divGrafics.classList.remove("progreso2");
	divGrafics.classList.add("progreso");
}