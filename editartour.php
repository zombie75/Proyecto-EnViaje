<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Editar tour</title>
		<link rel="stylesheet" href="css/estilo_editartour.css">
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
				<div id="caja">
					
					<div id="arriba"><h1>Editar servicio de tour</h1></div>
					<div id="abajo">
						<?php
							$id_servicio_tour=$_GET["id_servicio_tour"];

							echo '<form action="editartour2.php?id_servicio_tour='.$id_servicio_tour.'" enctype="multipart/form-data" method="post">
							<div id="Nom"><div id="txtNom">Ingrese nombre:</div><div class="inNom"><input type="text" name="txtNombre"></div></div>
						
							<div id="Reg">
								<div id="txtReg">Seleccione region:</div> 
								<div id="inReg"><select name="region" id="region">
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
								</select></div>
							</div></br>
							
							<div id="Dir"><div id="txtDir">Direccion:</div> <div id="inDir"><input type="text" name="txtDireccion"></div></div></br>
							
							<div id="Tel"><div id="txtTel">Telefono de contacto:</div> <div id="inTel"><input type="text" name="txtTelefono"></div></div></br>
							
							<div id="CorCon"><div id="txtCorCon"> Correo de contacto:</div> <div id="inCorCon"><input type="text" name="txtCorreocontacto"></div></div></br>
							
							<div id="ToEco"><div id="txtToEco">Tour mas economico:</div> <div id="inToEco"><input type="text" name="txtToureco"></div></div></br>
							
							<div id="ToCa"><div id="txtToCa">Tour mas caro:</div><div id="inToCa"><input type="text" name="txtTourost"></div></div></br>

							<div id="Imag"><div id="txtImag">Imagen 1:</div><div id="inImag"><input id="img1" type="file" name="img1" size="30"></div></div></br>

							<div id="Des"><div id="txtDes">Descripcion:</div><div id="inDes"><textarea name ="txtDescripcion" rows="10" cols="30"> </textarea></div></div>
								
							<div id="boton"><input type="submit" value="Agregar servicio"></div>
							
							</form>';
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>