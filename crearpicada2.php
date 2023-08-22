<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Crear picada</title>
		<link rel="stylesheet" href="css/estilo_login2.css">
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
					$descripcion = $_POST["txtDescripcion"];
					$region = $_POST["region"];
					$direccion = $_POST["txtDireccion"];
					// Recibo los datos de la imagen
					$nombre_img = $_FILES['img1']['name'];
					$tipo = $_FILES['img1']['type'];
					$tamano = $_FILES['img1']['size'];
					// registrar picada
					$res = $mysqli->query("INSERT INTO picada (nombre,direccion,region,descripcion,viajero_correo) VALUES ('$nombre','$direccion','$region','$descripcion','$correo')");
					if ($res==true) {
						$res2 = $mysqli->query("SELECT id_picada FROM picada ORDER BY id_picada DESC LIMIT 1");
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
						   	//agregar imagen a base de datos f[0] contiene la id de la picada creada anteriormente
						   	$imgn1=$mysqli->real_escape_string(file_get_contents($_FILES["img1"]["tmp_name"]));
						   	$sql="INSERT INTO `foto` (foto,viajero_correo,id_picada) VALUES ('$imgn1','$correo','$f[0]')";
				        	$mysqli->query($sql);
						      
						    } 
						    else 
						    {
						       //si no cumple con el formato
						       echo '<div id="cajaAviso">
										<h1>Error</h1>
										<h3>Formato de imagen incorrecto</h3>
									</div>
						       ';
						    }
						} 
						else 
						{
						   //si existe la variable pero se pasa del tamaño permitido
						   if($nombre_img == !NULL) 
						   	echo '<div id="cajaAviso">
								<h1>Aviso</h1>
								<h3>La imagen es demaciado grande</h3>
								<a href="picadas.php">Ver picadas</a>
							</div>
						';
						 
						}
						echo '<div id="cajaAviso">
								<h1>Aviso</h1>
								<h3>Picada creada con exito</h3>
								<a href="picadas.php">Ver picadas</a>
							</div>
						';
					}else{
						echo '<div id="cajaAviso">
								<h1>Aviso</h1>
								<h3>Error al registrar picada, intentelo nuevamente</h3>
								<a href="crearpicada.php">Volver a crear picada</a>
							</div>
						';
					}
				?>
			</div>
		</div>
	</body>
</html>