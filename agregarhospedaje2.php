<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Agregar servicio de hospedaje</title>
		<link rel="stylesheet" href="css/estilo_agregarhospedaje2.css">
	</head>

	<body>
		<div id="todo">
			<div id="top">
				<a href="enviaje.php">
					<div id="titulo1">En</div>
					<div id="titulo2">viaje</div>
					<div id="titulo3">.cl</div>
				</a>
			</div>
			
			<div id="centro">
				<?php
					include("conexion.php");
					session_start();
					$correo = $_SESSION["correo"];
					$nombre = $_POST["txtNombre"];
					$tipohospedaje = $_POST["tipohospe"];
					$telefono = $_POST["txtTelefono"];
					$correocon = $_POST["txtCorreocontacto"];
					$ncamas = $_POST["camas"];
					$nhabitaciones = $_POST["habitaciones"];
					$wifi = $_POST["wifi"];
					$tv = $_POST["tvcable"];
					$estacionamientos = $_POST["txtEstacionamientos"];
					$hospedajeeco = $_POST["txtHospedajeeco"];
					$hospedajeost = $_POST["txtHospedajeost"];

					$descripcion = $_POST["txtDescripcion"];
					$region = $_POST["region"];
					$direccion = $_POST["txtDireccion"];
					// Recibo los datos de la imagen
					$nombre_img = $_FILES['img1']['name'];
					$tipo = $_FILES['img1']['type'];
					$tamano = $_FILES['img1']['size'];
					// registrar hospedaje
					$res = $mysqli->query("INSERT INTO servicio_hospedaje (nombre_servicio,direccion,region,descripcion,usuario_ofrece_correo,tipo_hospedaje,nro_camas,nro_habitaciones,nro_estacionamientos,fono_contacto,email_contacto,wifi,cable,precio_economico,precio_ostentoso) VALUES ('$nombre','$direccion','$region','$descripcion','$correo','$tipohospedaje','$ncamas','$nhabitaciones','$estacionamientos','$telefono','$correocon','$wifi','$tv','$hospedajeeco','$hospedajeost')");
					if ($res==true) {
						$res2 = $mysqli->query("SELECT id_servicio_hospedaje FROM servicio_hospedaje ORDER BY id_servicio_hospedaje DESC LIMIT 1");
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
						   	//agregar imagen a base de datos f[0] contiene la id del hospedaje creado anteriormente
						   	$imgn1=$mysqli->real_escape_string(file_get_contents($_FILES["img1"]["tmp_name"]));
						   	$sql="INSERT INTO `foto` (foto,id_servicio_hospedaje) VALUES ('$imgn1','$f[0]')";
				        	$mysqli->query($sql);
						      
						    } 
						    else 
						    {
						       //si no cumple con el formato
						       echo '
						       		<div id="cajaAviso">
										<h1>Error</h1>
										<h3>No se puede subir una imagen con ese formato </h3>
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
									<h1>Aviso</h1>
									<h3>Hospedaje registrado exitosamente</h3>
									<a href="hospedajes.php">Ver Hospedajes</a>
								</div>
						';
					}else{
						echo '
							<div id="cajaAviso">
									<h1>Error</h1>
									<h3>Error al registrar hospedaje, intentelo nuevamente<br></h3>
									<a href="hospedajes.php">Ver Hospedajes</a>
									<a href="agregarhospedaje.php">Volver a agregar hospedaje</a>
								</div>
						';
					}
					 
					
				?>
			</div>
		</div>
	</body>
</html>