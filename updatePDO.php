<?php
	require 'conexionPDO.php';
	//Sql con marcadores
	$sql = "UPDATE `cliente` SET `dni` = '12345678S' WHERE `cliente`.`codc` = 1";
	//Preparar
	$stmtPDO = $conexionPDO->prepare($sql);
	//Ejecutamos
	$resultado = $stmtPDO->execute();
	if(!$resultado){
		die ("No se puede realizar la actualizacion $conexion->errno: $conexion->error");
	}
?>