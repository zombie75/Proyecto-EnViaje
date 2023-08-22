<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Editar servicio de comida</title>
		<link rel="stylesheet" href="css/estilo_editarcomida2.css">
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
				$id_servicio_comida=$_GET["id_servicio_comida"];
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
				// editar servicio comida
				$res = $mysqli->query("UPDATE servicio_comida SET nombre_servicio='$nombre',direccion='$direccion',region='$region',descripcion='$descripcion',usuario_ofrece_correo='$correo',tipo_comida='$tipocomida',opcion_vegetariana='$vegetariana',horario='$horario',estacionamiento='$estacionamiento',fono_contacto='$telefono',email_contacto='$correocon',wifi='$wifi',expendio_alcohol='$alcohol',plato_economico='$platoeco',plato_ostentoso='$platoost' WHERE id_servicio_comida='$id_servicio_comida'");
				if ($res==true) {
					echo '<meta http-equiv="Refresh" content="2;url=comidasver.php?id_servicio_comida='.$id_servicio_comida.'">';
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
							$res2 = $mysqli->query("UPDATE foto SET foto='$imgn1' WHERE id_servicio_comida='$id_servicio_comida'");
					      
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
							<h1>Aviso</h1>
							<h3>Servicio comida editado exitosamente</h3>
						</div>
		       		';
					
				}else{
					echo '<meta http-equiv="Refresh" content="2;url=comidasver.php?id_servicio_comida='.$id_servicio_comida.'">';
							echo "</head>
								<body>";

					echo '
			       		<div id="cajaAviso">
							<h1>Error</h1>
							<h3>Error al editar servicio de comida, intentelo nuevamente</h3>
						</div>
		       		';

				}
				 
				
				?>
			</div>
		</div>
	</body>
</html>