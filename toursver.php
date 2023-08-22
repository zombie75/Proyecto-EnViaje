<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Servicio de tour</title>
		<link rel="stylesheet" href="css/estilo_toursver.css">
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
					$id_servicio_tour = $_GET["id_servicio_tour"];
					
					$res = $mysqli->query("SELECT * FROM servicio_tour WHERE id_servicio_tour='$id_servicio_tour' ");
					$f = mysqli_fetch_row($res);

					$res2 = $mysqli->query("SELECT * FROM foto WHERE id_servicio_tour='$id_servicio_tour' ");
					$f2 = mysqli_fetch_row($res2);
					echo '<div id=derecha>
						<div id=cajaDatos>';
						echo ' <div id="txt">';
							echo "<div id=\"titulo\"><h1>".$f[1]."</h1></div>";//nombre 
							
							switch ($f[7]) {//region
								case '1':
									echo "<div id=\"MiDer\">I Tarapaca</div>";
									break;
								case '2':
									echo "<div id=\"MiDer\">II Antofagasta</div>";
									break;
								case '3':
									echo "<div id=\"MiDer\">III Atacama</div>";
									break;
								case '4':
									echo "<div id=\"MiDer\">IV Coquimbo</div>";
									break;
								case '5':
									echo "<div id=\"MiDer\">V Valparaiso</div>";
									break;
								case '6':
									echo "<div id=\"MiDer\">VI O'Higgins</div>";
									break;
								case '7':
									echo "<div id=\"MiDer\">VII Maule</div>";
									break;
								case '8':
									echo "<div id=\"MiDer\">VIII BioBio</div>";
									break;
								case '9':
									echo "<div id=\"MiDer\">IX Araucania</div>";
									break;
								case '10':
									echo "<div id=\"MiDer\">X Los Lagos</div>";
									break;
								case '11':
									echo "<div id=\"MiDer\">XI Aysen</div>";
									break;
								case '12':
									echo "<div id=\"MiDer\">XII Magallanes</div>";
									break;
								case '13':
									echo "<div id=\"MiDer\">RM Santiago</div>";
									break;
								case '14':
									echo "<div id=\"MiDer\">XIV Los Rios</div>";
									break;
								case '15':
									echo "<div id=\"MiDer\">XV Arica y Parinacota</div>";
									break;
								
								default:
									echo "<div id=\"MiDer\">regioncilla</div>";
									break;
							}
							echo "<div id=\"MiIz\">".$f[2]."</div>";//direccion
							//
							echo "<div id=\"MiDer\">Telefono contacto: ".$f[3]."</div>";
							echo "<div id=\"MiIz\">Email: ".$f[4]."</div>";
							echo "<div id=\"MiDer\">Rango de precios: $".$f[5]." - $".$f[6]."</div></br>";
							//
							echo "<div id=\"desc\">".$f[8]."</div> </div>";//descripcion
							echo '<div id="delaimag">
									<img src="data:image/jpeg;base64,'.base64_encode($f2[1]).' " width="220px" height="220px"/>
								</div>';//imagen
						echo '</div>';
					//Comentarios
						//agregar comentario
					if ($_SESSION["tipouser"]==1) {
						echo '<div id="agCom">
							<div id="nombre"><h2>Agregar comentario</h2></div>
							<form action="agregarcomentario.php?servicio_tipo=4&id_servicio='.$f[0].'" method="post">
								<div id="nombre">Titulo:<input type="text" name="txtTitulo"></div>
								<div id="nombre">Calificacion: <select name="calificacion" id="calificacion">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select></div>
								<div id="nombre">Comentario: <textarea name ="txtComentario" rows="6" cols="30"> </textarea></div>
								<div id="boton"><input type="submit" value="Agregar comentario"></div>
							</form>
							</div>';
					echo '</div>';
					}else
					{
						if ($_SESSION["tipouser"]==2) {
							if (strcmp($_SESSION["correo"],$f[9])==0) {
								echo '<form action="editartour.php?id_servicio_tour='.$id_servicio_tour.'" method="post">
								<div id="boton"><input type="submit" value="Editar servicio"></div>
								</form>';
							}
						}
					}
						//mostrar comentarios
					
					$res3 = $mysqli->query("SELECT * FROM comentario ORDER BY id_comentario DESC ");
					$f3 = mysqli_fetch_row($res3);
					$nf = $f3[0];
					echo '<div id="izquierda">';
					for ($i=$nf; $i >= 0 ; $i--) { 
						$resi = $mysqli->query("SELECT * FROM comentario WHERE id_comentario='$i' ");
							$fi = mysqli_fetch_row($resi);
							if (strcmp($fi[0], "") == 0) {
								//comprueba que no este vacio
							}else{
								$resi2 = $mysqli->query("SELECT * FROM comentario WHERE id_comentario='$i' ");
								$fi2 = mysqli_fetch_row($resi2);
								if (strcmp($fi[7], $id_servicio_tour)==0) {
									echo '<div id="verCom">';
											echo "<div id='comentario'><br>";
												echo '<div id="nombre"><h3>'.$fi2[1].'</h3></div>';//titulo
												echo "<div id=\"nombre\">Calificacion: ".$fi2[2]."</div>";//calificacion
												echo '<div id="nombre">'.$fi2[3].'</div>';//descripcion comentario
												echo "<div id=\"nombre\">Escrito por: ".$fi[8]."</div>";
											echo "</div>";
										echo '</div>';
								}
								
							}
					}
					echo "</div>"
				?>
		
			</div>
		</div>
	</body>
</html>