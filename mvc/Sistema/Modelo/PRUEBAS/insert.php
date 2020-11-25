<?php
	require 'conexion.php';
	$conexion->set_charset('utf8'); //establece el conjunto de caracteres en la conexión, para que no haya problema de acentos y ñ de los campos
	$sql = "INSERT INTO `articulo` (`coda`, `nombre`, `pvp`, `color`, `ctd`, `iva`) VALUES ('10', 'Margarita Regular', '4', 'Blanco', '100', '20.00');";
	$resultado = $conexion->query($sql);
	if (!$resultado) {
	die("No se puede realizar la inserción $conexion->errno: $conexion->error");
	}
?>