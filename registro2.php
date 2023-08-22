<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	<link rel="stylesheet" href="css/estilo_registro2.css">
</head>
	<body>
		<div id="todo">
				<div id="top">
					<a href="enviaje.php"><div id="titulo1">En</div>
					<div id="titulo2">viaje</div>
					<div id="titulo3">.cl</div></a>
				</div>
		<?php

			//traer variables
			if(isset($_POST["userTipe"])) //isset consulta si tiene valor la variable
			{
				if($_POST["userTipe"] == 1)//usuario viajero
				{
					echo '<div id="cajaRegistro"><div id="inicio">Usuario viajero</div>';
					//reg exitoso
					session_start();
					$_SESSION["correo"]=$_POST["txtEmail"];
					$_SESSION["nombre"]=$_POST["txtNombre"];
					$_SESSION["fechan"]=$_POST["diaN"]."/".$_POST["mesN"]."/". $_POST["anioN"];
					$_SESSION["pass"]=$_POST["txtPass"];
					$_SESSION["usertipe"]=1;
					

					echo "<div id=\"correo\"><div id=\"textoCorreo\">Correo:</div><div id=\"cajaCorreo\">".$_POST["txtEmail"]."</div></div>";
					echo "<div id=\"nombre1\"><div id=\"textoNombre1\">Nombre:</div><div id=\"cajaNombre1\">".$_POST["txtNombre"]."</div></div>";
					
					echo "<div id=\"fecha\"><div id=\"textoFecha\">Fecha nacimiento:</div> <div id=\"cajaFecha\">".$_POST["diaN"]."/".$_POST["mesN"]."/". $_POST["anioN"]."</div></div>";
					echo '<form action="registrofin.php" method="post">';

					echo '<div id="boton"><input type="submit" value="Continuar"></div>';

					echo '</div>';

				}
				else //usuario ofrese servicio
				{	
					session_start();
					$_SESSION["correo"]=$_POST["txtEmail"];
					$_SESSION["nombre"]=$_POST["txtNombre"];
					$_SESSION["fechan"]=$_POST["diaN"]."/".$_POST["mesN"]."/". $_POST["anioN"];
					$_SESSION["pass"]=$_POST["txtPass"];
					$_SESSION["usertipe"]=2;

					echo '<div id="cajaRegistro">';
						echo '<div id="inicio">Usuario ofrece servicio</div>';
						echo '<form action="registrofin.php" method="post">';
							echo '<div id=direccion><div id="textoDireccion">Dirección:</div> <div id=cajaDireccion><input type="text" name="txtDireccion" value="calle ejemplo #123, ejemplo"></div></div>';
							echo '<div id="telefono"><div id="textoTelefono">Teléfono:</div> <div id=cajaTelefono><input type="text" name="txtTelefono" value="+56987654321"></div></div>';
							echo '<div id="nombre"><div id="textoNombre">Nombre empresa:</div> <div id="cajaNombre"><input type="text" name="txtEmpresa" value="Turismo ejemplo"></div></div>
							';
						echo '<div id="boton"><input type="submit" value="Continuar"></div>';
					echo "</div";


					echo '</form> ';

				}
			}
		?>
		</div>
	</body>
</html>

