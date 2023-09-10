<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>EnViaje</title>
		<link rel="stylesheet" href="css/estilo.css">
			<?php
			session_start();
			if (isset($_SESSION["correo"])) {
				
			}else{
				$_SESSION["correo"]=0;
				$_SESSION["tipouser"]=0;
			}
			?>
	</head>

	<body>
		<?php
		
		?>
		<div id="todo">
			<div id="top">

				<a href="enviaje.php"><div id="titulo1">En</div>
				<div id="titulo2">viaje</div>
				<div id="titulo3">.cl</div></a>

				<?php
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
				<a href="hospedajes.php"><div id="hospedaje"></div></a>
				<a href="comidas.php"><div id="comida"></div></a>
				<a href="tours.php"><div id="turismo"></div></a>
				<a href="picadas.php"><div id="picadas"></div></a>
			</div>
		</div>
	
	</body>
</html>