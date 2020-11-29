<?php
    //Funciones MySQL

	function sql($consulta)
	{
		include("conexion.php");
		$consultar = $conexion->query($consulta);
		if($consultar == false)
		{
			return mysqli_error($conexion);
		}
		return $consultar;
		mysqli_free_result($consultar); 
	}
	
	function insertsql($consulta)
	{
		include("conexion.php");
	    $consultar = $conexion->query($consulta) or die(mysqli_error($conexion));
		$ultimoid = mysqli_insert_id($conexion);
		return $ultimoid;
		mysqli_free_result($consultar); 
	}

	
	function selectsql($consulta)
	{
		include("conexion.php");
	    $consultar = $conexion->query($consulta) or die(mysqli_error($conexion));
		$consultar = mysqli_fetch_assoc($consultar);
		return $consultar;
		mysqli_free_result($consultar); 
	}
	
	function ssql($valor)
	{
		include("conexion.php");
		$valor = $conexion->real_escape_string($valor);
		return $valor;
	}
?>
