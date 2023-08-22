<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Agregar servicio de hospedaje</title>
		<link rel="stylesheet" href="css/estilo_agregarhospedaje.css">
	</head>

	<body>
		<div id="todo">
			<div id="top">
				<a href="enviaje.php">
					<div id="titulo1">En</div>
					<div id="titulo2">viaje</div>
					<div id="titulo3">.cl</div>
				</a>
			</div>

			<div id="centro">
				<div id="caja">
					<div id="arriba"><h1>Agregar servicio de hospedaje</h1></div>

					<div id="abajo">
						<form action="agregarhospedaje2.php" enctype="multipart/form-data" method="post">

							<div id="Nom">Nombre:<input type="text" name="txtNombre"></div>
							<div id="Reg">Region:	<select name="region" id="region">
										<option value="1">I Tarapaca</option>
										<option value="2">II Antofagasta</option>
										<option value="3">III Atacama</option>
										<option value="4">IV Coquimbo</option>
										<option value="5">V Valparaiso</option>
										<option value="6">VI O'Higgins</option>
										<option value="7">VII Maule</option>
										<option value="8">VIII BioBio</option>
										<option value="9">IX Araucania</option>
										<option value="10">X Los Lagos</option>
										<option value="11">XI Aysen</option>
										<option value="12">XII Magallanes</option>
										<option value="13">RM Santiago</option>
										<option value="14">XIV Los Rios</option>
										<option value="15">XV Arica y Parinacota</option>
									</select></div><br>
							
							<div id="Dir">Direccion:<input type="text" name="txtDireccion"></div>

							<div id="Hos">Hospedaje:
								<select name="tipohospe" id="tipohospe">
										<option value="1">Hotel</option>
										<option value="2">Hostal</option>
										<option value="3">Cabañas</option>
									</select>
							</div><br>

							<div id="Tel">Telefono:<input type="text" name="txtTelefono"></div>

							<div id="Cor">Correo:<input type="text" name="txtCorreocontacto"></div>

							<div id="Cama">Camas:
								<select name="camas" id="camas">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
									</select>
							</div>

							<div id="Hab">Habitaciones:
									<select name="habitaciones" id="habitaciones">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>
							</div>

							<div id="Wif">¿Cuenta con wifi? <select name="wifi" id="wifi">
													<option value="1">si</option>
													<option value="2">no</option>
												</select><br>

							<div id="TV">¿Cuenta con TV cable? <select name="tvcable" id="tvcable">
													<option value="1">si</option>
													<option value="2">no</option>
												</select></div>

							<div id="Esta">Numero de estacionamientos: <input type="text" name="txtEstacionamientos"></div>

							<div id="HosEco">Hospedaje mas economico: <input type="text" name="txtHospedajeeco"></div>

							<div id="HosCar">Hospedaje mas caro: <input type="text" name="txtHospedajeost"></div>
							
							<div id="Des">Descripcion: <textarea name ="txtDescripcion" rows="10" cols="30"></textarea></div><br>

							<div id="Imag">Imagen 1: <input id="img1" type="file" name="img1" size="30"></div>

							<div id="boton"><input type="submit" value="Agregar servicio"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>