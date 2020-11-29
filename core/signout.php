<?php
    session_start();
    include("../core/config/include.php");
    include("../core/model/models.php");
    $acceso = new Acceso();
    $acceso->cerrarSession($_SESSION['usuario']);
    unset($_SESSION['usuario']); 
    session_destroy();	
    header("Location: ../index.php");	
?>
