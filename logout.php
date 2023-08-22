<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Cerrando sesion</title>
		<link rel="stylesheet" href="css/estilo_logout.css">
			<?php
			session_start();
			$_SESSION["correo"]=0;
			$_SESSION["nombre"]=0;
			$_SESSION["tipouser"]=0;
			echo '<meta http-equiv="Refresh" content="2;url=enviaje.php">
	</head>
		<body>
			<div id=todo>
				<div id="top">
					<a href="enviaje.php">
						<div id="titulo1">En</div>
						<div id="titulo2">viaje</div>
						<div id="titulo3">.cl</div>
					</a>
				</div>

				<div id="centro">
					<div id="cajaAviso">
						<h1>Aviso</h1>
						<h3>Cerrando sesion</h3>
					</div>
				</div>
			</div>
		';
	?>
</body>
</html>