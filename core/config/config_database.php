<?php	
	date_default_timezone_set('Mexico/General');
	define("IP",$_SERVER['REMOTE_ADDR']);
	define("FECHA", date("Y-m-d H:i:s"));	
	define("USUARIOBD","root");
	define("PASSWORDBD","root");
	define("HOSTBD","localhost");
	define("BD","sistema_control");
	define("SSL", FALSE);
	define("SECURE", FALSE);	
?>