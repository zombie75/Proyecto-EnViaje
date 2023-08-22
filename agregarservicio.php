<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Selecione servicio a agregar</title>
		<link rel="stylesheet" href="css/estilo_agregarservicio.css">
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
					/*if (strcmp($_SESSION["correo"], 0)==0) {
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
					}*/
				?>
			</div>

			<div id="centro">
				<div id="cajaimagenes">

					<div id="hospedaje">
						<a href="agregarhospedaje.php">
						<div id="texto">Hospedaje</div>
						<div class="img"><img src="img/hospedaje.png" width="200px" height="200px"></div>

						</a>
					</div>

					<div id="comida">
						<a href="agregarcomida.php">
							<div id="texto">Comida</div>
							<div class="img"><img src="img/comida.png" width="200px" height="200px"></div>
						</a>
					</div>

					<div id="tour">
						<a href="agregartour.php">
							<div id="texto">Turismo</div>
							<div class="img"><img src="img/tour.png" width="200px" height="200px"></div>
						</a>
					</div>

					<?php 
						// hacer menú con imagenes, como el que aprarece en las imagenes del prototipo
					?>
				</div>
			</div>
		</div>	
	</body>
</html>