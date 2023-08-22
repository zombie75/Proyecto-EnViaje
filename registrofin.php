<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Registro</title>
		<link rel="stylesheet" href="css/estilo_registrofin.css">
	</head>
	<body>
		<div id="todo">
			<div id="top">
				<a href="enviaje.php"><div id="titulo1">En</div>
				<div id="titulo2">viaje</div>
				<div id="titulo3">.cl</div></a>
			</div>
			<div id="centro">
				<div id="cajaAviso">
					<?php

					include("conexion.php");
					session_start();
					$nombre = $_SESSION["nombre"];
					$correo = $_SESSION["correo"];
					$fecha = $_SESSION["fechan"];
					$pass = $_SESSION["pass"];
					$_SESSION["tipouser"]  = $_SESSION["usertipe"];
					$fecha_reg = date("j")."/".date("n")."/".date("Y");

					if ($_SESSION["usertipe"] == 1) {
						//usuario viajero
						$res = $mysqli->query("INSERT INTO usuario_viajero (correo_electronico,nombre,fecha_registro,fecha_nacimiento,contraseña) VALUES ('$correo','$nombre','$fecha_reg','$fecha','$pass')");    
						if ($res==true) {
							echo '<div id="arriba"><h1>Registrado exitosamente</h1></div>';
						}else{
							echo '<div id="arriba">Error al registrarse, intentelo nuevamente</div>';
						}
					}else{
						//usuario ofrece servicio
						$direccion = $_POST["txtDireccion"]; 
						$telefono = $_POST["txtTelefono"]; 
						$empresa = $_POST["txtEmpresa"]; 
						$res = $mysqli->query("INSERT INTO usuario_ofrece_servicio (correo_electronico,nombre,direccion,telefono,contraseña,nombre_empresa) VALUES ('$correo','$nombre','$direccion','$telefono','$pass','$empresa')");
						
						if ($res==true) {
							echo '<div id="arriba"><h1>Registrado exitosamente</h1></div>';
						}else{
							echo '<div id="arriba">Error al registrarse, intentelo nuevamente</div>';
						}
					}
					?>
					<div id="abajo">
						<div id="reg"><a href="enviaje.php">Regresar al incio</a></div>
						<div id="log"><a href="enviaje.php">Iniciar sesion</a></div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>