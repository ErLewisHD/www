<?php
	require 'conexion.php';
	$conexion->set_charset('utf8'); //establece el conjunto de caracteres en la conexión, para que no haya problema de acentos y ñ de los campos
	$sql = "DELETE FROM `articulo` WHERE `articulo`.`coda` = 10";
	$resultado = $conexion->query($sql);
	if (!$resultado) {
	die("No se puede realizar la inserción $conexion->errno: $conexion->error");
	}
?>