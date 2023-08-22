<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar servicio de comida</title>
	<link rel="stylesheet" href="css/estilo_editarcomida.css">
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
				<div id="arriba"><h1>Editar servicio de comida</h1></div>
				<?php
				$id_servicio_comida=$_GET["id_servicio_comida"];
				echo '<form action="editarcomida2.php?id_servicio_comida='.$id_servicio_comida.'" enctype="multipart/form-data" method="post">
						<div id="Nombre">Ingrese nombre:<input type="text" name="txtNombre"></div>

						<div id="Reg">
								Seleccione region: 
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

							<div id="Dire">Direccion: <input type="text" name="txtDireccion"></div>

							<div id="TCom">Tipo comida: <select name="tipocomida" id="tipocomida">
												<option value="1">Restaurant</option>
												<option value="2">Comida rapida</option>
											</select>
							</div>

							<div id="TelCon">Telefono de contacto: <input type="text" name="txtTelefono"></div><br>

							<div id="CorCon">Correo de contacto: <input type="text" name="txtCorreocontacto"></div><br>

							<div id="OV">¿Opcion vegetariana? <select name="vegetariana" id="vegetariana">
													<option value="1">si</option>
													<option value="2">no</option>
												</select></div><br>

							<div id="Hor">Horario desde: <input type="text" name="txtHorario1"> hasta: <input type="text" name="txtHorario2"></div><br>

							<div id="PEco">Plato mas economico: <input type="text" name="txtPlatoeco"></div>

							<div id="PCar">Plato mas caro: <input type="text" name="txtPlatoost"></div><br>

							<div id="Alc">Expendio de bebidas alcoholicas: <select name="alcohol" id="alcohol">
													<option value="1">si</option>
													<option value="2">no</option>
												</select></div><br>

							<div id="Wifi">¿Cuenta con wifi? <select name="wifi" id="wifi">
													<option value="1">si</option>
													<option value="2">no</option>
												</select></div>

							<div id="Esta">¿Cuenta con estacionamiento? <select name="estacionamiento" id="estacionamiento">
													<option value="1">si</option>
													<option value="2">no</option>
												</select></div>

							<div id="Imag">Imagen 1: <input id="img1" type="file" name="img1" size="30"></div><br>

							<div id="Des">Descripcion: <textarea name ="txtDescripcion" rows="10" cols="30"> </textarea></div><br>
							<div id="boton"><input type="submit" value="Editar servicio"></div>
					</form>';
					?>
				</div>
			</div>
		</div>
	</body>
</html>