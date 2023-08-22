<?php
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$base="enviaje";
	//mysql_connect($servidor,$usuario,$clave);
	//mysql_select_db($base);


	$mysqli = new mysqli($servidor, $usuario , $clave, $base);
	$mysqli->set_charset("utf8");
	
?>