<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Servicio de comida</title>
		<link rel="stylesheet" href="css/estilo_comidasver.css">
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
					$id_servicio_comida = $_GET["id_servicio_comida"];
					
					$res = $mysqli->query("SELECT * FROM servicio_comida WHERE id_servicio_comida='$id_servicio_comida' ");
					$f = mysqli_fetch_row($res);

					$res2 = $mysqli->query("SELECT * FROM foto WHERE id_servicio_comida='$id_servicio_comida' ");
					$f2 = mysqli_fetch_row($res2);
					echo '<div id=derecha>
							<div id=cajaDatos>';
							echo '<div id="txt">';
						echo "<div id=\"titulo\"><h1>".$f[2]."</h1></div>";//nombre 
						
						switch ($f[11]) {//region
							case '1':
								echo "<div id=\"MiDer\"><h3>I Tarapaca</h3></div>";
								break;
							case '2':
								echo "<div id=\"MiDer\"><h3>II Antofagasta</h3></div>";
								break;
							case '3':
								echo "<div id=\"MiDer\"><h3>III Atacama</h3></div>";
								break;
							case '4':
								echo "<div id=\"MiDer\"><h3>IV Coquimbo</h3></div>";
								break;
							case '5':
								echo "<div id=\"MiDer\"><h3>V Valparaiso</h3></div>";
								break;
							case '6':
								echo "<div id=\"MiDer\"><h3>VI O'Higgins</h3></div>";
								break;
							case '7':
								echo "<div id=\"MiDer\"><h3>VII Maule</h3></div>";
								break;
							case '8':
								echo "<div id=\"MiDer\"><h3>VIII BioBio</h3></div>";
								break;
							case '9':
								echo "<div id=\"MiDer\"><h3>IX Araucania</h3></div>";
								break;
							case '10':
								echo "<div id=\"MiDer\"><h3>X Los Lagos</h3></div>";
								break;
							case '11':
								echo "<div id=\"MiDer\"><h3>XI Aysen</h3></div>";
								break;
							case '12':
								echo "<div id=\"MiDer\"><h3>XII Magallanes</h3></div>";
								break;
							case '13':
								echo "<div id=\"MiDer\"><h3>RM Santiago</h3></div>";
								break;
							case '14':
								echo "<div id=\"MiDer\"><h3>XIV Los Rios</h3></div>";
								break;
							case '15':
								echo "<div id=\"MiDer\"><h3>XV Arica y Parinacota</h3></div>";
								break;
							
							default:
								echo "<div id=\"MiDer\"><h3>regioncilla</h3></div>";
								break;
						}
						echo "<div  id=\"MiIz\"><h3>".$f[3]."</h3></div>";//direccion
						
						//
						switch ($f[6]) {
							case '1':
								echo "<div id=\"MiDer\">Opcion vegetariana: si </div>";
							break;

							default:
								echo "<div id=\"MiDer\">Opcion vegetariana: no</div>";
								break;
						}
						switch ($f[13]) {
							case '1':
								echo "<div id=\"MiIz\">Estacionamiento: si </div>";
							break;
						
							default:
								echo "<div id=\"MiIz\">Estacionamiento: no</div>";
								break;
						}
						switch ($f[10]) {
							case '1':
								echo "<div id=\"MiDer\">Expendio de alcohol: si </div>";
							break;
							
							default:
								echo "<div id=\"MiDer\">Expendio de alcohol: no</div>";
							break;
						}
						switch ($f[12]) {
							case '1':
								echo "<div id=\"MiIz\">Wifi: si </div>";
							break;
								
							default:
								echo "<div id=\"MiIz\">Wifi: no</div>";
							break;
						}
						echo "<div id=\"MiDer\">Horario: ".$f[7]." </div>";
						echo "<div id=\"MiIz\">Rango de precios: $".$f[8]." - $".$f[9]."</div>";
						
						echo "<div id=\"MiDer\">Telefono contacto: : ".$f[4]."</div>";
						echo "<div id=\"MiIz\">Correo contacto: ".$f[5]."</div>";
						//
						echo "<div id=\"desc\">".$f[14]."</div>";//descripcion
						echo '</div>';
						echo '<div id="delaimag">
								<img src="data:image/jpeg;base64,'.base64_encode($f2[1]).' " width="220px" height="220px"/>
							</div>';//imagen
					
						echo '</div>';
					//Comentarios
						//agregar comentario
					if ($_SESSION["tipouser"]==1) {
						echo '<div id="agCom">
							<div id="nombre"><h2>Agregar comentario</h2></div>
							<form action="agregarcomentario.php?servicio_tipo=3&id_servicio='.$f[0].'" method="post">
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
							</div>
					</div>';

					}else
					{
						if ($_SESSION["tipouser"]==2) {
							if (strcmp($_SESSION["correo"],$f[15])==0) {
								echo '<form action="editarcomida.php?id_servicio_comida='.$id_servicio_comida.'" method="post">
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
								if (strcmp($fi[6], $id_servicio_comida)==0) {
									
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
					echo "</div>";
				?>
			</div>
		</div>
	</body>
</html>