<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Editar tour</title>
		<link rel="stylesheet" href="css/estilo.css">
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
					$id_servicio_tour=$_GET["id_servicio_tour"];
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
					$res = $mysqli->query("UPDATE servicio_tour SET nombre_servicio='$nombre',direccion='$direccion',region='$region',descripcion='$descripcion',usuario_ofrece_correo='$correo',fono_contacto='$telefono',email_contacto='$correocon',precio_economico='$toureco',precio_ostentoso='$tourost' WHERE  id_servicio_tour='$id_servicio_tour'");
					if ($res==true) {
						echo '<meta http-equiv="Refresh" content="2;url=toursver.php?id_servicio_tour='.$id_servicio_tour.'">';
						echo "</head>
							<body>";
						
						if (($nombre_img == !NULL) && ($_FILES['img1']['size'] <= 2000000)) 
						{
						   //indicamos los formatos que permitimos subir a nuestro servidor
						   if (($_FILES["img1"]["type"] == "image/gif")
						   || ($_FILES["img1"]["type"] == "image/jpeg")
						   || ($_FILES["img1"]["type"] == "image/jpg")
						   || ($_FILES["img1"]["type"] == "image/png"))
						   {
						   		$imgn1=$mysqli->real_escape_string(file_get_contents($_FILES["img1"]["tmp_name"]));
								$res2 = $mysqli->query("UPDATE foto SET foto='$imgn1' WHERE id_servicio_tour='$id_servicio_tour'");
						      
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

						echo "";
						echo '
				       		<div id="cajaAviso">
								<h1>Aviso</h1>
								<h3>Tour editado exitosamente</h3>
							</div>
				        ';

						
					}else{
						echo '<meta http-equiv="Refresh" content="2;url=toursver.php?id_servicio_tour='.$id_servicio_tour.'">';
								echo "</head>
									<body>";
						echo '
				       		<div id="cajaAviso">
								<h1>Error</h1>
								<h3>Error al editar servicio de tour, intentelo nuevamente</h3>
							</div>
				        ';

					}			
				?>
			</div>
		</div>
	</body>
</html>