<!DOCTYPE html>
<html>
<head>
<title>Registro completo</title>
<meta charset=utf-8 /> </head>
<body align="center">

<?php
require './conexion.php';

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
		header('Location: ../Vista/login.php');
	}

?>

</body>
</html>
