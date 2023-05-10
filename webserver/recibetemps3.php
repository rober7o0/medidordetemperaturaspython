<?php
header("Access-Control-Allow-Origin: *");

//Connect & Select Database
mysql_connect("localhost","root","Clavedebase") or die("could not connect server");
mysql_select_db("root") or die("could not connect database");

//Create New Account
 
	// $hora = $_POST['hora'];

	// $temp1 = $_POST['temp1'];
	// $temp2 = $_POST['temp2'];
	
	//$fecha = htmlspecialchars($_GET["hora"]);
	//$temperatura = $_POST["temperatura"];
	
	$temperatura = $_GET['temperatura'];


	 
		$date=date("d-m-y h:i:s");
		$q=mysql_query("insert into `temperatura` (`termometro`,`temperatura`) values ('simerefri','$temperatura')");
		if($q)
		{
			echo "success";
		}
		else
		{
			echo "failed";
		}
	 
	echo mysql_error();


?>