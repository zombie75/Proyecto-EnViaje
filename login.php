<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Iniciar sesión</title>
	<link rel="stylesheet" href="css/estilo_login.css">
</head>
	<body>
		<div id="todo">
			<div id="top">
				<div id="titulo1">En</div>
				<div id="titulo2">viaje</div>
				<div id="titulo3">.cl</div>

				<a href="registro.php"><div id="log">Regístrate</div></a>
			</div>

			<div id="centro">
				<form action="login2.php" id="cajaLogin" method="post">
				
					<div id="correo">
						<div id="textoCorreo">Correo electronico:</div>
						<div id="cajaCorreo"><input type="text" name="txtEmail"></div>
					</div>

					<div id="contra">
						<div id="textoContra"> Contraseña: </div>
						<div id="cajaContra"><input type="password" name="txtPass"></div>
					</div>

					<div id="boton">
						<div id="tonton"><input type="submit" value="Iniciar sesión"></div>
					</div>			
				</form>
			</div>
		</div>
	</body>
</html>