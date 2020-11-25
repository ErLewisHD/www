<!DOCTYPE html>
<html>
<head>
<title>Login completo</title>
<meta charset=utf-8 /> </head>
<body align="center">

<?php
	require 'conexionPDO.php';
	session_start();
	//Sql con marcadores
	$sql = "SELECT * FROM cliente WHERE dni=:dni";
	//Preparar
	$stmtPDO = $conexionPDO->prepare($sql);
	//Obtenemos los valores para los parametros
	$dni = $_POST['dni'];
	$pass = sha1($_POST['password']);
	$resultado = $stmtPDO->execute(array(':dni' => $dni));

	if (!$resultado) {
		die ("Error en la consulta");
	}
	else if($stmtPDO->rowCount() == 0){
		echo '<center><br><br><br><br>El usuario no está registrado';
	}
	else {
		$registro = $stmtPDO->fetch(PDO::FETCH_ASSOC);
		if ($pass == $registro['password']) {
			$_SESSION['usuario'] = $registro['nombre'];
			header("Location: http://localhost/index");
		} else {
			echo '<center><br><br><br><br>Contraseña incorrecta';
		}
	}
?>


</body>
</html>
