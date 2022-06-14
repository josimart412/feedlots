<?php
	//Parametros de la conexion
	$dbip= "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "feedlots";
	//Conexion
	$con = mysqli_connect($dbip, $dbuser, $dbpass, $dbname);
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>
