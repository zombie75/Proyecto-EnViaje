<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Agregar tour</title>
		<link rel="stylesheet" href="css/estilo_agregartour2.css">
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
					$telefono = $_POST["txtTelefono"];
					$correocon = $_POST["txtCorreocontacto"];

					$toureco = $_POST["txtToureco"];
					$tourost = $_POST["txtTourost"];

					$descripcion = $_POST["txtDescripcion"];
					$region = $_POST["region"];
					$direccion = $_POST["txtDireccion"];
					// Recibo los datos de la imagen
					$nombre_img = $_FILES['img1']['name'];
					$tipo = $_FILES['img1']['type'];
					$tamano = $_FILES['img1']['size'];
					// registrar servicio tour
					$res = $mysqli->query("INSERT INTO servicio_tour (nombre_servicio,direccion,region,descripcion,usuario_ofrece_correo,fono_contacto,email_contacto,precio_economico,precio_ostentoso) VALUES
																	   ('$nombre','$direccion','$region','$descripcion','$correo','$telefono','$correocon','$toureco','$tourost')");
					if ($res==true) {
						$res2 = $mysqli->query("SELECT id_servicio_tour FROM servicio_tour ORDER BY id_servicio_tour DESC LIMIT 1");
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
						   	$sql="INSERT INTO `foto` (foto,id_servicio_tour) VALUES ('$imgn1','$f[0]')";
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
								<h3>Tour registrado exitosamente</h3>
								<a href="tours.php">Ver servicios de tour</a>
							</div> 
					       	';
					}else{
						echo '
				       		<div id="cajaAviso">
								<h1>Error</h1>
								<h3>Error al registrar servicio de tour, intentelo nuevamente</h3>
								<a href="agregartour.php">Volver a agregar servicio de tour</a>
							</div> 
				       	'; 
					}
					 
					
				?>

			</div>
		</div>
	</body>
</html>