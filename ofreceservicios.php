<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Usuario ofrece servicios</title>
		<link rel="stylesheet" href="css/estilo_ofreceservicio.css">
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
				<div id="cajaDatos">
					<?php
						include("conexion.php");
						
						$correo = $_SESSION["correo"];

						$res = $mysqli->query("SELECT * FROM usuario_ofrece_servicio WHERE correo_electronico='$correo' ");
						$f = mysqli_fetch_row($res);

						echo "<div id=\"saludo\"><h1>Hola ".$f[1]."</h1></div>";//nombre usuario ofrese servicio
						echo "<div id=\"correo\"><h3>".$f[0]."</h3></div>";//correo 
						echo "<div id=\"direccion\"><h3>Direccion: ".$f[2]."</h3></div>";//direccion empresa
						echo "<div id=\"telefono\"><h3>Telefono: ".$f[3]."</h3></div> ";//telefono empresa
						echo "<div id=\"empresa\"><h3>Nombre empresa: ".$f[5]."</h3></div> ";//nombre empresa
					?>
				</div>

				<div id="linkInicio"><a href='enviaje.php'>Ir al inicio</a></div>
				<div id="linkVer"><a href='agregarservicio.php'>Agregar servicio</a></div>
							
			</div>
		</div>
	</body>
</html>