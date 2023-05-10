 <?php

$page = $_SERVER['PHP_SELF'];
$sec = "2000000";
$con=mysql_connect("localhost", "root", "Clavedebase");


$hospital = $_GET["selectbasic"];

if($hospital=1){
$hospital= "eugrefri";
}

$fecha = $_GET["day"];

mysql_select_db("root",$con);
$sql="SELECT temperatura FROM temperatura where termometro = '$hospital'   ORDER BY fecha DESC LIMIT 1"; //código MySQL
$datos=mysql_query($sql,$con); //enviar código MySQL
($row=mysql_fetch_array($datos));  //Bucle para ver todos los registros
           $tipo=$row['temperatura'];
		     

$sql="SELECT min(temperatura) as temperatura FROM temperatura where termometro = '$hospital' and DATE(fecha) = '$fecha' "; //código MySQL
$datos=mysql_query($sql,$con); //enviar código MySQL
($row=mysql_fetch_array($datos));  //Bucle para ver todos los registros
           $minima=$row['temperatura'];

 

$sql="SELECT max(temperatura) as temperatura FROM temperatura where termometro = '$hospital' and DATE(fecha) = '$fecha' "; //código MySQL
$datos=mysql_query($sql,$con); //enviar código MySQL
($row=mysql_fetch_array($datos));  //Bucle para ver todos los registros
           $maxima=$row['temperatura'];

 

$sql="SELECT avg(temperatura) as temperatura FROM temperatura where termometro = '$hospital' and DATE(fecha) = '$fecha' "; //código MySQL
$datos=mysql_query($sql,$con); //enviar código MySQL
($row=mysql_fetch_array($datos));  //Bucle para ver todos los registros
           $promedio=$row['temperatura'];




?>

<!DOCTYPE html>
<html>

<head>

<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
  <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
  <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
  </script>
  <style>
    html,
    body,
    #myChart {
      height: 100%;
      width: 100%;
    }
  </style>
</head>

<body>
<p> Temperatura Promedio del dia <?php echo $fecha; ?></p> Temperatura: <?php echo $promedio; ?></p>
<p> Temperatura Minima del dia <?php echo $fecha; ?></p>  Temperatura: <?php echo $minima; ?></p>
<p> Temperatura Maxima del dia <?php echo $fecha; ?></p>  Temperatura: <?php echo $maxima; ?></p>


<p style="text-align: center;"><span style="font-size: 26pt; font-family: arial black,sans-serif;">Temperatura del Dia de hoy: <?php echo $tipo; ?> C.</span></p>
  <div id='myChart'></div>
  <script>
    var myConfig6 = {
      "type": "gauge",
      "scale-r": {
        "aperture": 200,
        "values": "0:100:1",
        "center": {
          "size": 5,
          "background-color": "#66CCFF #FFCCFF",
          "border-color": "none"
        },
        "ring": { //Ring with Rules
          "size": 10,
          "rules": [{
            "rule": "%v >= 0 && %v <= 8",
            "background-color": "red"
          }, {
            "rule": "%v >= 8 && %v <= 12",
            "background-color": "orange"
          }, {
            "rule": "%v >= 12 && %v <= 14",
            "background-color": "yellow"
          }, {
            "rule": "%v >= 15 && %v <= 19",
            "background-color": "green"
          }, {
            "rule": "%v >= 19 && %v <=22",
            "background-color": "yellow"
          }, {
            "rule": "%v >= 22 && %v <= 24",
            "background-color": "orange"
          }, {
            "rule": "%v >= 25 && %v <= 100",
            "background-color": "red"
          }]
        }
      },
      "plot": {
        "csize": "5%",
        "size": "100%",
        "background-color": "#000000"
      },
      "series": [{
        "values": [<?php echo $tipo; ?>]
      }]
    };

    zingchart.render({
      id: 'myChart',
      data: myConfig6,
      height: "100%",
      width: "100%"
    });
  </script>




</body>

</html>