<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Iniciar sesión</title>
	<link rel="stylesheet" href="css/estilo_login2.css">
	<?php
		include("conexion.php");
		session_start();

		$email = $_POST["txtEmail"];
		$pass = $_POST["txtPass"];
		$res = $mysqli->query("SELECT correo_electronico,contraseña,nombre FROM usuario_viajero WHERE correo_electronico='$email'");
		//$f[0] 
		$f = mysqli_fetch_row($res);
		$res2 = $mysqli->query("SELECT correo_electronico,contraseña,nombre FROM usuario_ofrece_servicio WHERE correo_electronico='$email'");
		//$ff[0] 
		$ff = mysqli_fetch_row($res2);
		if ((strcmp($email, "")==0) ||( strcmp($pass, "")==0)) {
			echo '<meta http-equiv="Refresh" content="2;url=login.php">
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
								<h1>Error</h1>
								<h3>Porfavor rellene todos los campos, intente nuevamente</h3>
							</div>
						</div>
					</div>
			';
		}else{
			if (strcmp($f[0], $email) == 0) {
				if (strcmp($f[1], $pass) == 0) {
					
					//crear sesion
					$_SESSION["correo"]=$email;
					$_SESSION["nombre"]=$f[2];
					$_SESSION["tipouser"]=1;
					echo '<meta http-equiv="Refresh" content="2;url=viajero.php">
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
									<h3>Login exitoso, redireccionando</h3>
								</div>
							</div>
						</div>
					';
									
				}else{
					
					echo '<meta http-equiv="Refresh" content="2;url=login.php">
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
								<h1>Error</h1>
								<h3>Usuario o contraseña incorrecto, porfavor intente nuevamente</h3>
							</div>
						</div>
					</div>
					';
				}
			}else{

				if (strcmp($ff[0], $email) == 0) {
					if (strcmp($ff[1], $pass) == 0) {
						
						//crear sesion usuario ofrece servicio
						$_SESSION["correo"]=$email;
						$_SESSION["nombre"]=$ff[2];
						$_SESSION["tipouser"]=2;
						echo '<meta http-equiv="Refresh" content="2;url=ofreceservicios.php">
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
								<h1>Logrado</h1>
								<h3>Login exitoso, redireccionando</h3>
							</div>
						</div>
					</div>
					';
					}else{
					
					echo '<meta http-equiv="Refresh" content="2;url=login.php">
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
								<h1>Error</h1>
								<h3>Usuario o contraseña incorrecto, intente nuevamente</h3>
							</div>
						</div>
					</div>
					';
					}
				}else{
					echo '<meta http-equiv="Refresh" content="2;url=login.php">
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
								<h1>Error</h1>
								<h3>Usuario o contraseña incorrecto, intente nuevamente</h3>
							</div>
						</div>
					</div>
					';

				}
			}
		}
	
    ?>	
	</body>
</html>