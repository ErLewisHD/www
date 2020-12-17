<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href="../../css/login1.css">
	<title>Inicio de sesión de un cliente</title>
	<meta charset=utf-8 />
	<script src="../../lib/scripts.js"></script>
</head>

<body align='center'>
	<style>
		input[type=submit],input[type=reset], input[type=button]{
		  font-family: "Roboto", sans-serif;
		  text-transform: uppercase;
		  outline: 0;
		  background: #4CAF50;
		  width: 100%;
		  border: 0;
		  padding: 15px;
		  color: #FFFFFF;
		  font-size: 14px;
		  -webkit-transition: all 0.3 ease;
		  transition: all 0.3 ease;
		  cursor: pointer;
		}
	</style>

	<?php
		require '../Controlador/controlador.php';
		if(isset ($_POST["dni"]) && isset ($_POST["password"])){
			$salida = loginController($_POST["dni"], $_POST["password"]);
			if($salida == '0'){
				header('Location: ./index.php');
			}
			else if($salida == '1'){
				echo "<p id='errorLogin'></p>";
			}
			else if($salida == '404'){
				header('Location: ./error.html');
			}
		}
	?>

	<div class="login-page">
	  <div class="form">
			<h1 align='center'>Iniciar sesión</h1>
	    <form action="./login.php" method="post" class="login-form">
	      <input type="text" NAME="dni" pattern="^[0-9]{8}[a-zA-Z]{1}$" title="Formato incorrecto, por favor introduzca su dni del tipo: 44556677A"
		  	placeholder="Introduza su DNI" required />
	      <input type="password" NAME="password" placeholder="Contraseña" required />
				<p id="mensajeErrorLogin" style="display:none">Usuario y/o contraseña incorrectos</p><br>
	      <input type="submit" value="Acceder"/> <input type="button" value="Cancelar" onclick="redirectIndex()"/>
	      <p class="message">¿No tienes una cuenta con nosotros? <a href="./registro">Regístrarse</a></p>
	    </form>
	  </div>
	</div>

	<script>
		if(document.getElementById("errorLogin")){
		  document.getElementById("mensajeErrorLogin").style.display = "block";
		}
	</script>
</body>
</html>
