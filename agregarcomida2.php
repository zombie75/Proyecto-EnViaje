<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Agregaer servicio de comida</title>
		<link rel="stylesheet" href="css/estilo_agregarcomida2.css">
	</head>

	<body>
		<div id="todo">
			<div id="top">
				<a href="enviaje.php">
					<div id="titulo1">En</div>
					<div id="titulo2">viaje</div>
					<div id="titulo3">.cl</div>
				</a>
				
				<?php
				session_start();
					if (strcmp($_SESSION["correo"], 0)==0) {
						echo '<a href="login.php"><div id="reg">Inicia sesión</div></a>';
						echo '<a href="registro.php"><div id="log">Regístrate</div></a>';
					}else{
						if ($_SESSION["tipouser"]==1) {
							echo '<a href="viajero.php"><div id="reg"style="font-size: 30px;">'.substr($_SESSION["nombre"], 0, 9).'...</div></a>';
							echo '<a href="logout.php"><div id="log"style="font-size: 28px;">Cerrar sesion</div></a>';
						}else{
							echo '<a href="ofreceservicios.php"><div id="reg"style="font-size: 30px;">'.substr($_SESSION["nombre"], 0, 9).'...</div></a>';
							echo '<a href="logout.php"><div id="log"style="font-size: 28px;">Cerrar sesion</div></a>';
						}
						
					}
				?>

			</div>

			<div id="centro">
				<?php
					include("conexion.php");
					
					$correo = $_SESSION["correo"];
					$nombre = $_POST["txtNombre"];
					$tipocomida = $_POST["tipocomida"];
					$telefono = $_POST["txtTelefono"];
					$correocon = $_POST["txtCorreocontacto"];
				
					$vegetariana = $_POST["vegetariana"];
					$wifi = $_POST["wifi"];
					$horario = $_POST["txtHorario1"] ."-". $_POST["txtHorario2"];
					$estacionamiento = $_POST["estacionamiento"];
					$platoeco = $_POST["txtPlatoeco"];
					$platoost = $_POST["txtPlatoost"];
					$alcohol = $_POST["alcohol"];

					$descripcion = $_POST["txtDescripcion"];
					$region = $_POST["region"];
					$direccion = $_POST["txtDireccion"];
					// Recibo los datos de la imagen
					$nombre_img = $_FILES['img1']['name'];
					$tipo = $_FILES['img1']['type'];
					$tamano = $_FILES['img1']['size'];
					// registrar servicio comida
					$res = $mysqli->query("INSERT INTO servicio_comida (nombre_servicio,direccion,region,descripcion,usuario_ofrece_correo,tipo_comida,opcion_vegetariana,horario,estacionamiento,fono_contacto,email_contacto,wifi,expendio_alcohol,plato_economico,plato_ostentoso) VALUES
																	   ('$nombre','$direccion','$region','$descripcion','$correo','$tipocomida','$vegetariana','$horario','$estacionamiento','$telefono','$correocon','$wifi','$alcohol','$platoeco','$platoost')");
					if ($res==true) {
						$res2 = $mysqli->query("SELECT id_servicio_comida FROM servicio_comida ORDER BY id_servicio_comida DESC LIMIT 1");
						$f = mysqli_fetch_row($res2);
						// registrar imagen

						//Si existe imagen y tiene un tamaño correcto
						if (($nombre_img == !NULL) && ($_FILES['img1']['size'] <= 2000000)) 
						{
						   //indicamos los formatos que permitimos subir a nuestro servidor
						   if (($_FILES["img1"]["type"] == "image/gif")
						   || ($_FILES["img1"]["type"] == "image/jpeg")
						   || ($_FILES["img1"]["type"] == "image/jpg")
						   || ($_FILES["img1"]["type"] == "image/png"))
						   {
						   	//agregar imagen a base de datos f[0] contiene la id del servicio comida creado anteriormente
						   	$imgn1=$mysqli->real_escape_string(file_get_contents($_FILES["img1"]["tmp_name"]));
						   	$sql="INSERT INTO `foto` (foto,id_servicio_comida) VALUES ('$imgn1','$f[0]')";
				        	$mysqli->query($sql);
						      
						    } 
						    else 
						    {
						       //si no cumple con el formato
						       echo ' 
							       	<div id="cajaAviso">
										<h1>Error</h1>
										<h3>No se puede subir una imagen con ese formato</h3>
									</div>
						       ';
						    }
						} 
						else 
						{
						   //si existe la variable pero se pasa del tamaño permitido
						   if($nombre_img == !NULL) 
						   	echo ' 
							   	<div id="cajaAviso">
									<h1>Error</h1>
									<h3>La imagen es demasiado grande</h3>
								</div>
						   '; 
						}


						echo '
							<div id="cajaAviso">
								<h1>Hecho!</h1>
								<h3>Hospedaje registrado exitosamente</h3>
								
							</div>
						';
						
					}else{
						echo '
							<div id="cajaAviso">
								<h1>Error</h1>
								<h3>Error al registrar servicio de comida, intentelo nuevamente</h3>
								<a href="agregarcomida.php">Volver a agregar servicio comida</a>
							</div>
						';
					}
				?>
			</div>
		</div>
	</body>
</html>