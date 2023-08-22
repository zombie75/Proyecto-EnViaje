<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Picadas</title>
		<link rel="stylesheet" href="css/estilo_picadas.css">
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
				<h1>Picadas</h1>
				<?php

				if (isset($_GET["region"])) {

                    }else{
                        $_GET["region"]=0;
                    }

				echo '<form action="picadas.php?region=region">
						<select name="region" id="region">
							<option value="0">Todos</option>
							<option value="1">I Tarapaca</option>
							<option value="2">II Antofagasta</option>
							<option value="3">III Atacama</option>
							<option value="4">IV Coquimbo</option>
							<option value="5">V Valparaiso</option>
							<option value="6">VI OHiggins</option>
							<option value="7">VII Maule</option>
							<option value="8">VIII BioBio</option>
							<option value="9">IX Araucania</option>
							<option value="10">X Los Lagos</option>
							<option value="11">XI Aysen</option>
							<option value="12">XII Magallanes</option>
							<option value="13">RM Santiago</option>
							<option value="14">XIV Los Rios</option>
							<option value="15">XV Arica y Parinacota</option>
						</select>
						<input type="submit" value="filtrar">
					</form>
					';

				include("conexion.php");
				$rgn = $_GET["region"];
				$res = $mysqli->query("SELECT * FROM picada ORDER BY id_picada DESC ");
				$f = mysqli_fetch_row($res);
				$nf = $f[0]; //nro filas
				//$f[0]-[5]
				$res2 = $mysqli->query("SELECT * FROM foto ORDER BY id_foto DESC ");
				$f2 = mysqli_fetch_row($res2);
				$nf2 = $f2[0]; //nro filas
				for ($i=$nf; $i>=0 ; $i--) { 
					$resi = $mysqli->query("SELECT * FROM picada WHERE id_picada='$i' ");
					$fi = mysqli_fetch_row($resi);
					if (strcmp($fi[0], "") == 0) {
						//comprueba que no este vacio
					}else{
						$resi2 = $mysqli->query("SELECT * FROM foto WHERE id_picada='$i' ");
						$fi2 = mysqli_fetch_row($resi2);
						if ($rgn == 0) {

						echo "<a href='picadasver.php?id_picada=".$fi[0]."' style='text-decoration:none;color:black'><div id=\"picada\">
						";//inicio div picada individual con variables por url, ademas style que cambia color de letras y subrayado de link

							echo "<div id='datos'>";
							echo "<div id=\"nombre\">".$fi[1]."</div>";//nombre
						
							switch ($fi[3]) {//region
								case '1':
									echo "<div id=\"region\">I Tarapaca</div>";
									break;
								case '2':
									echo "<div id=\"region\">II Antofagasta</div>";
									break;
								case '3':
									echo "<div id=\"region\">III Atacama</div>";
									break;
								case '4':
									echo "<div id=\"region\">IV Coquimbo</div>";
									break;
								case '5':
									echo "<div id=\"region\">V Valparaiso</div>";
									break;
								case '6':
									echo "<div id=\"region\">VI O'Higgins</div>";
									break;
								case '7':
									echo "<div id=\"region\">VII Maule</div>";
									break;
								case '8':
									echo "<div id=\"region\">VIII BioBio</div>";
									break;
								case '9':
									echo "<div id=\"region\">IX Araucania</div>";
									break;
								case '10':
									echo "<div id=\"region\">X Los Lagos</div>";
									break;
								case '11':
									echo "<div id=\"region\">XI Aysen</div>";
									break;
								case '12':
									echo "<div id=\"region\">XII Magallanes</div>";
									break;
								case '13':
									echo "<div id=\"region\">RM Santiago</div>";
									break;
								case '14':
									echo "<div id=\"region\">XIV Los Rios</div>";
									break;
								case '15':
									echo "<div id=\"region\"XV Arica y Parinacota</div>";
									break;
								
								default:
									echo "<div><h3>error</h3></div>";
									break;
							}
							echo "<div id=\"direccion\"> ".$fi[2]."</div>";//direccion
							echo "<div id=\"desc\"> ".substr($fi[4], 0, 50)."...<br></div></div>";//descripcion acordada a 50 caracteres
							echo '<div id="delaimg"><div id="imag"><img src="data:image/jpeg;base64,'.base64_encode($fi2[1]).' " width="100px" height="100px"/></div></div>
							</div></a>
						';//imagen y cierre de div picada individual
					}else{
						if (strcmp($rgn, $fi[3])==0) {
								echo "<a href='picadasver.php?id_picada=".$fi[0]."' style='text-decoration:none;color:black'><div id=\"picada\">
						";//inicio div picada individual con variables por url, ademas style que cambia color de letras y subrayado de link

							echo "<div id='datos'>";
							echo "<div id=\"nombre\">".$fi[1]."</div>";//nombre
						
							switch ($fi[3]) {//region
								case '1':
									echo "<div id=\"region\">I Tarapaca</div>";
									break;
								case '2':
									echo "<div id=\"region\">II Antofagasta</div>";
									break;
								case '3':
									echo "<div id=\"region\">III Atacama</div>";
									break;
								case '4':
									echo "<div id=\"region\">IV Coquimbo</div>";
									break;
								case '5':
									echo "<div id=\"region\">V Valparaiso</div>";
									break;
								case '6':
									echo "<div id=\"region\">VI O'Higgins</div>";
									break;
								case '7':
									echo "<div id=\"region\">VII Maule</div>";
									break;
								case '8':
									echo "<div id=\"region\">VIII BioBio</div>";
									break;
								case '9':
									echo "<div id=\"region\">IX Araucania</div>";
									break;
								case '10':
									echo "<div id=\"region\">X Los Lagos</div>";
									break;
								case '11':
									echo "<div id=\"region\">XI Aysen</div>";
									break;
								case '12':
									echo "<div id=\"region\">XII Magallanes</div>";
									break;
								case '13':
									echo "<div id=\"region\">RM Santiago</div>";
									break;
								case '14':
									echo "<div id=\"region\">XIV Los Rios</div>";
									break;
								case '15':
									echo "<div id=\"region\"XV Arica y Parinacota</div>";
									break;
								
								default:
									echo "<div><h3>error</h3></div>";
									break;
							}
							echo "<div id=\"direccion\"> ".$fi[2]."</div>";//direccion
							echo "<div id=\"desc\"> ".substr($fi[4], 0, 50)."...<br></div></div>";//descripcion acordada a 50 caracteres
							echo '<div id="delaimg"><div id="imag"><img src="data:image/jpeg;base64,'.base64_encode($fi2[1]).' " width="100px" height="100px"/></div></div>
							</div></a>
						';//imagen y cierre de div picada individual
						}
					}
						
					}
					
				}
				
				?>	
				
		</div>
	</body>
</html>