<?php 

//FUNCION PARA ENVIAR LA DATA A LA BASE DE DATOS

function sendInfo(){

	$url="https://c-h-finca-la-primavera-default-rtdb.firebaseio.com/Variables.json";
	$ch=curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response=curl_exec($ch);
	curl_close($ch);

	//Llamar a la data
	$data= json_decode($response, true);

	$fecha=date("d-M-Y H:i A");
	$ce=$data["CE"];
	$temp=$data["T"];
	$ph=$data["pH"];


	$dataDB = array(
		"Fecha"=>$fecha,
		"Conductividad Electrica"=>$ce,
		"Temperatura"=>$temp,
		"Ph"=>$ph,
	);

	$sendData=json_encode($dataDB);

		//Envio de datos a base de datos firebase



	$url="https://c-h-finca-la-primavera-default-rtdb.firebaseio.com/history.json";

	$ch=curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));

	$response=curl_exec($ch);


	//Guardar la data en txt

	$file='/var/www/html/hydroWeb/ddbbFiles/Historico '.$fecha.'.txt';
	$contentFile="Fecha: ".$fecha."\nConductividad Electrica: ".$ce."s/cm"."\nTemperatura: ".$temp."°"."\nPh: ".$ph."\n\n";
	$fileOpen=fopen($file, 'a');
	fwrite($fileOpen, $contentFile);
	fclose($file);	

}

date_default_timezone_set("America/Bogota");
$date=date("H:i:s");
echo $date;

switch ($date) {
	case '03:00:00':
		sendInfo();
		break;
	case '06:00:00':
		sendInfo();
		break;
	case '09:00:00':
		sendInfo();
		break;
	case '12:00:00':
		sendInfo();
		break;
	case '15:00:00':
		sendInfo();
		break;
	case '18:00:00':
		sendInfo();
		break;
	case '21:00:00':
		sendInfo();
		break;
	case '00:00:00':
		sendInfo();
		break;
	default:
		echo " nada";
		break;
}

sendInfo();

?>
