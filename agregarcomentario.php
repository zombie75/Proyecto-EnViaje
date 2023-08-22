<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Agregar comentario</title>
		<link rel="stylesheet" href="css/estilo_agregarcomentario.css">
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
					$titulo = $_POST["txtTitulo"];
					$comentario = $_POST["txtComentario"];
					$calificacion = $_POST["calificacion"];

					$servicio_tipo = $_GET["servicio_tipo"];
					$id_servicio = $_GET["id_servicio"];
					switch ($servicio_tipo) {
						case '1':
							$res = $mysqli->query("INSERT INTO comentario (titulo,calificacion,descripcion,viajero_correo,id_picada) VALUES ('$titulo','$calificacion','$comentario','$correo','$id_servicio')");
							if ($res==true) {

								echo '
									<div id="cajaAviso">
										<h1>Aviso</h1>
										<h3>Comentario registrado exitosamente</h3>
										
									</div>
								';
							}else{
								echo'

									<div id="cajaAviso">
										<h1>Error</h1>
										<h3>Error al registrar comentario, intentelo nuevamente</h3>
										
									</div>
								';
							}
							break;
						case '2':
							$res = $mysqli->query("INSERT INTO comentario (titulo,calificacion,descripcion,viajero_correo,id_servicio_hospedaje) VALUES ('$titulo','$calificacion','$comentario','$correo','$id_servicio')");
							if ($res==true) {

								echo '
									<div id="cajaAviso">
										<h1>Aviso</h1>
										<h3>Comentario registrado exitosamente</h3>
								
									</div>
								';
							}else{
								echo'

									<div id="cajaAviso">
										<h1>Error</h1>
										<h3>Error al registrar comentario, intentelo nuevamente</h3>
								
									</div>
								';
							}
							break;
						case '3':
							$res = $mysqli->query("INSERT INTO comentario (titulo,calificacion,descripcion,viajero_correo,id_servicio_comida) VALUES ('$titulo','$calificacion','$comentario','$correo','$id_servicio')");
							if ($res==true) {

								echo '
									<div id="cajaAviso">
										<h1>Aviso</h1>
										<h3>Comentario registrado exitosamente</h3>
										
									</div>
								';
							}else{
								echo'

									<div id="cajaAviso">
										<h1>Error</h1>
										<h3>Error al registrar comentario, intentelo nuevamente</h3>
									
									</div>
								';
							}
							break;
						case '4':
							$res = $mysqli->query("INSERT INTO comentario (titulo,calificacion,descripcion,viajero_correo,id_servicio_tour) VALUES ('$titulo','$calificacion','$comentario','$correo','$id_servicio')");
							if ($res==true) {

								echo '
									<div id="cajaAviso">
										<h1>Aviso</h1>
										<h3>Comentario registrado exitosamente</h3>
				
									</div>
								';
							}else{
								echo'

									<div id="cajaAviso">
										<h1>Error</h1>
										<h3>Error al registrar comentario, intentelo nuevamente</h3>
				
									</div>
								';
							}
							break;
						default:
							
							break;
					}


					
				?>
			</div>
		</div>
	</body>
</html>