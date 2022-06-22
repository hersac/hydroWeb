<?php 

function varGraficos(){

  $url="https://c-h-finca-la-primavera-default-rtdb.firebaseio.com/history.json";
  $ch=curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response=curl_exec($ch);
  curl_close($ch);
  $data= json_decode($response, true);
  foreach ($data as $key => $value) {

    echo '["'.$data[$key]["Fecha"].'",  '.$data[$key]["Conductividad Electrica"].','.$data[$key]["Temperatura"].','.$data[$key]["Ph"].'],';

  }
}

echo <<< EOF

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<div id="curve_chart"></div>

<script type="text/javascript">

      google.charts.load("current", {"packages":["corechart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Fechas", "CE", "Temp",  "Ph"],
EOF;

varGraficos();

echo <<< EOF

        ]);

        var options = {
          title: "Monitoreo Fisico-Quimico",
          hAxis: {title: "Fecha",  titleTextStyle: {color: "#333"}},
          vAxis: {minValue: 0},
        };

        var chart = new google.visualization.AreaChart(document.getElementById("curve_chart"));
        chart.draw(data, options);
      }

</script>

EOF;



?>