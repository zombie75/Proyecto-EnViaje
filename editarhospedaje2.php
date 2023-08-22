<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Editar servicio de hospedaje</title>
		<link rel="stylesheet" href="css/estilo_editarhospedaje2.css">
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
					$id_servicio_hospedaje=$_GET["id_servicio_hospedaje"];
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
					// editar hospedaje
					$res = $mysqli->query("UPDATE servicio_hospedaje SET nombre_servicio='$nombre',direccion='$direccion',region='$region',descripcion='$descripcion',usuario_ofrece_correo='$correo',tipo_hospedaje='$tipohospedaje',nro_camas='$ncamas',nro_habitaciones='$nhabitaciones',nro_estacionamientos='$estacionamientos',fono_contacto='$telefono',email_contacto='$correocon',wifi='$wifi',cable='$tv',precio_economico='$hospedajeeco',precio_ostentoso='hospedajeost' WHERE id_servicio_hospedaje='$id_servicio_hospedaje'");
					if ($res==true) {
						echo '<meta http-equiv="Refresh" content="2;url=hospedajesver.php?id_servicio_hospedaje='.$id_servicio_hospedaje.'">';
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
								$res2 = $mysqli->query("UPDATE foto SET foto='$imgn1' WHERE id_servicio_hospedaje='$id_servicio_hospedaje'");
						      
						    } 
						    else 
						    {
						       //si no cumple con el formato
						       echo '<div id="cajaAviso">
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

						   	echo '<div id="cajaAviso">
										<h1>Error</h1>
										<h3>La imagen es demasiado grande</h3>
									</div>	
						       '; 
						}

						echo '<div id="cajaAviso">
										<h1>Aviso</h1>
										<h3>Hospedaje editado exitosamente</h3>
									</div>	
						       '; 
						
					}else{
						echo '<meta http-equiv="Refresh" content="2;url=hospedajesver.php?id_servicio_hospedaje='.$id_servicio_hospedaje.'">';
								echo "</head>
									<body>";
						echo "<br>";
						echo '<div id="cajaAviso">
									<h1>Error</h1>
									<h3>Error al editar servicio de hospedaje, intentelo nuevamente</h3>
							</div>
				       '; 
					} 
				?>
			</div>
		</div>
	</body>
</html>