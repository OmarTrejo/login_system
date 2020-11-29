<?php	
	require_once('config_database.php');	
	$conexion = new mysqli(HOSTBD, USUARIOBD, PASSWORDBD, BD) or die (mysqli_connect_error());
?>