<?php
	$conexion = new mysqli('localhost', 'root', '', 'partyflowers');
	if($conexion->connect_error){
		header('Location : ../Vista/error.html');
		exit();
	}
?>
