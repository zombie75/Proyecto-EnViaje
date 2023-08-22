<!DOCTYPE html>
<?php
	include("conexion.php");
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Registro</title>
		<link rel="stylesheet" href="css/estilo_registro.css">
	</head>

	<body>
		<div id="todo">
			<div id="top">
				<a href="enviaje.php"><div id="titulo1">En</div>
				<div id="titulo2">viaje</div>
				<div id="titulo3">.cl</div></a>
			</div>

			<div id="centro">
				<div id="cajaRegistro">
					<div id="inicio">
						<div id="foto"></div>
						<div id="registrate">
							<div id="registrateTexto" >Registrate</div>
						</div>
					</div>
					<div id="datos">
					<form action="registro2.php" method="post">
						<div id="email">
							<div id="textoEmail">Email:</div>
							<div id="cajaEmail"><input type="text" name="txtEmail" value="ejemplo@ejemplo.com"></div>
						</div>
						
						<div id="nombre">
							<div id="textoNombre">Nombre:</div>
							<div id="cajaNombre" ><input type="text" name="txtNombre" value="Juanito Perez Machuca"></div>
						</div>
						<div id="fecha">
							<div id="textoFecha">Fecha nacimiento:</div>
							<div id="cajaFecha">Dia: <select name="diaN" id="diaN">
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
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="128">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
							</select>
							Mes: <select name="mesN" id="mesN">
								<option value="1">Enero</option>
								<option value="2">Febrero</option>
								<option value="3">Marzo</option>
								<option value="4">Abril</option>
								<option value="5">Mayo</option>
								<option value="6">Junio</option>
								<option value="7">Julio</option>
								<option value="8">Agosto</option>
								<option value="9">Septiembre</option>
								<option value="10">Octubre</option>
								<option value="11">Nobiembre</option>
								<option value="12">Diciembre</option>
							</select>
							Año: <select name="anioN" id="anioN">
								<?php 
									$x = 2018; 

									while($x >= 1900) {
									    echo "<option value=$x>$x</option>";
									    $x--;
									} 
								?>
							</select>
							</div>
						</div></br>

						<div id="contra">
								<div id="textoContra">Contraseña:</div>
								<div id="cajaContra"><input type="password" name="txtPass" value="********"></div></br>
						</div>

						<div id="contra2">
							<div id="textoContra2">Repita contraseña:</div>
							<div id="cajaContra2"><input type="password" name="txtRepass" value="********"></br></div>
						</div>

						<div id="tipoUsuario">
							<div id="textoUsuario">Seleccione tipo usuario:</div>
							<div id="cajaUsuario">
								<select name="userTipe" id="userTipe">
									<option value="1">Usuario Viajero</option>
									<option value="2">Usuario ofrece servicio</option>
								</select>
							</div>
						</div>
							
						<div id="boton"><input type="submit" value="Continuar"></div>
						
					</form>
				</div>
		</div>
	</body>
</html>