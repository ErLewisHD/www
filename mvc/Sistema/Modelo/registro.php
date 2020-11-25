<!DOCTYPE html>
<html>
<head>
<title>Registro completo</title>
<meta charset=utf-8 /> </head>
<body align="center">

<?php
require './conexion.php';
require "../../lib/recaptchalib.php";

	//Recaptcha
	$secret = "6LdSM-0ZAAAAALAlk2RiAsoPi96q6KykzerpHtg_";
	$response = null;
	$reCaptcha = new ReCaptcha($secret);

	// if submitted check response
	if ($_POST["g-recaptcha-response"]) {
			$response = $reCaptcha->verifyResponse(
					$_SERVER["REMOTE_ADDR"],
					$_POST["g-recaptcha-response"]
			);
	}else {die("Recaptcha vacio");}

	//Campos para registro
	$conexion->set_charset('utf8'); //establece el conjunto de caracteres en la conexión, para que no haya problema de acentos y ñ de los campos
	$pass = sha1($_POST["password"]);
	$sql = "INSERT INTO `cliente` (
	`codc`, `dni`, `password`, `nombre`, `direccion`, `tlf`) VALUES (NULL, '$_POST[DNI]', '$pass' , '$_POST[nombre]', '$_POST[direccion]', '$_POST[prefijo].$_POST[telefono]');";
	$resultado = $conexion->query($sql);
	if (!$resultado) {
		echo "<h1>¡¡ERROR FATAL!!</h1>";
		echo "<h2>Algo no ha ido bien</h2>";
	die("No se puede realizar el registro (error numero:<b>$conexion->errno</b>): <br><b>$conexion->error</b>");
	}
	else{
		echo "<h1>¡¡Bienvenido/a "; echo $_POST["nombre"]; echo "!!</h1><br>";
		echo "<h2>GRACIAS POR CONFIAR EN NOSOTROS</h2>";
		echo "<h2>Tu registro ha sido completado con los siguientes datos</h2><br>";
		echo "<b>DNI:</b> "; echo $_POST["DNI"]; echo "<br>";
		echo "<b>TLF:</b> "; echo $_POST["prefijo"]; echo " "; echo $_POST["telefono"]; echo "<br>";
		echo "<b>DIRECCION:</b> "; echo $_POST["direccion"]; echo "<br>";
	}

?>

</body>
</html>
