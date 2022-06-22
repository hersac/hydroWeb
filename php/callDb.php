<?php
//Llamado de datos firebase


$url="https://c-h-finca-la-primavera-default-rtdb.firebaseio.com/Variables.json";
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response=curl_exec($ch);
curl_close($ch);

//Mostrar la data
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


function showInfo(){

	$url="https://c-h-finca-la-primavera-default-rtdb.firebaseio.com/history.json";
	$ch=curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response=curl_exec($ch);
	curl_close($ch);

	//Mostrar la data
	$data= json_decode($response, true);
	foreach ($data as $key => $value) {
		echo '<p>';
		echo "Fecha: ".$data[$key]["Fecha"]."<br> Conductividad Electrica: ".$data[$key]["Conductividad Electrica"]."<br> Temperatura: ".$data[$key]["Temperatura"]."<br> Ph: ".$data[$key]["Ph"]."<br><br>";
		
		//Boton descargar
		
		echo <<< EOF
		<a href="../ddbbFiles/Historico 
		EOF;

		echo $data[$key]["Fecha"];

		echo <<< EOF
		.txt" download class="btnDownload" id="btnDownload">Descargar</a>

		EOF;
		echo '</p>';
	}

}



?>