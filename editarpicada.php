<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Editar picada</title>
		<link rel="stylesheet" href="css/estilo_editarpicada.css">
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
				<div id="cajaRegistro">
					<div id="inicio">Agregar picada</div>
					<?php
						$id_picada=$_GET["id_picada"];
						echo '<form action="editarpicada2.php?id_picada='.$id_picada.'" enctype="multipart/form-data" method="post">
							<div id="nombre"><div id="textoNombre">Ingrese nombre:</div><div id="cajaNombre"><input type="text" name="txtNombre"></div></div>
							<div id="region">
								<div id="textoRegion">Seleccione region:</div>
								<div id="cajaRegion">
									<select name="region" id="region">
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
								</div>
							</div>
							<div id="direccion"><div id="textoDireccion">Direccion:</div> <div id="cajaDireccion"><input type="text" name="txtDireccion"></div></div>	
							<div id="descripcion"><div id="textoDescripcion">Descripcion:</div> <div id="cajaDescripcion"><textarea name ="txtDescripcion" rows="10" cols="25"> </textarea></div></div>
							<div id="imagen"><div id="textoImagen">Imagen 1:</div> <div id="cajaImagen"><input id="img1" type="file" name="img1" size="30"></div></div>
							<div id="boton"><input type="submit" value="Editar picada"></div>
						</form>';
					?>
				</div>
			</div>
		</div>
	</body>
</html>