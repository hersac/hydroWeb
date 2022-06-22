<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HydroWeb | Home</title>

<!-- Links -->

	<link rel="stylesheet" href="../css/homeStyle.css?v=<?php echo time(); ?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<script type="text/javascript" src="../js/main.js"></script>


</head>
<body>

	<?php require_once("./callDb.php")?>
	

	<div class="content" id="content">
		<div class="content2" id="content2">
			<div class="time" id="time">
				<h1>Hoy</h1>
				<h1 class="today" id="today"></h1>
			</div>
			<div class="info" id="info">

				<table class="table">
					<tr>
						<td><p>Conductividad Electrica: </p></td>
						<td><?php echo $ce." s/cm"; ?></td>
					</tr>
					<tr>
						<td><p>Temperatura: </p></td>
						<td><?php echo $temp."°"; ?></td>
					</tr>
					<tr>
						<td><p>Ph: </p></td>
						<td><?php echo $ph; ?></td>
					</tr>
				</table>
			</div>
		</div>

		<!--seccion Historial-->
		<button class="btnHistory" id="btnHistory" onclick="showHistory()">Historial</button>
		<button class="btnHistory" id="btnGraficos" onclick="verProgreso()">Progreso</button>

		<div class="history" id="history">
			<h2>Historial</h2>
			
			<button class="btnBack" id="btnBack" onclick="back()">Regresar</button>			

			<div class="showInfo">
				<?php showInfo(); ?>
			</div>

		</div>
						<!--Seccion graficos-->
		<div class="historialGrafico" id="historialGrafico">
			<div class="progreso" id="progreso">
				<div class="graficosContent" id="graficosContent">
				<button class="btnBack" onclick="back()">Regresar</button>	
					<?php include_once('./grafica.php') ?>
				</div>
			</div>
		</div>

</body>
</html>