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

	$url="https://c-h-finca-la-primavera-default-rtdb.firebaseio.com/Historial.json";
	$ch=curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response=curl_exec($ch);
	curl_close($ch);

	//Mostrar la data
	$data= json_decode($response, true);

	foreach ($data as $key => $value) {
		foreach ($value as $key2 => $value2) {
			echo '<div class="infoH">';
				echo "Fecha: ".$key."<br> Hora: ".$value[$key2]["Hora"]."<br> Conductividad Electrica: ".$value[$key2]["CE"]."<br> Temperatura: ".$value[$key2]["T"]."<br> Ph: ".$value[$key2]["pH"]."<br><br>";
/*
			//Generacion .TXT

			$file='/var/www/html/hydroWeb/ddbbFiles/Historico '.$key."/".$value[$key2]["Hora"].'.txt';
			$contentFile="Fecha: ".$key."\nHora: ".$value[$key2]["Hora"]."\nConductividad Electrica: ".$value[$key2]["CE"]."s/cm"."\nTemperatura: ".$value[$key2]["T"]."°"."\nPh: ".$value[$key2]["pH"]."\n\n";
			$fileOpen=fopen($file, 'a');
			fwrite($fileOpen, $contentFile);
			fclose($file);
*/	
					//Boton descargar
			echo '<p>';
					echo <<< EOF
					<a href="../ddbbFiles/Historico 
					EOF;
			
					echo $key."/".$value[$key2]["Hora"];
			
					echo <<< EOF
					.txt" download class="btnDownload" id="btnDownload">Descargar</a>
			
					EOF;
				echo '</p>';

			echo '</div>';
        }
	}
}





?>