<?php

	require './conexionPDO.php';
	//Sql con marcadores
	$sql = "SELECT * FROM cliente WHERE nombre = :nombre";
	//Preparar
	$stmtPDO = $conexionPDO->prepare($sql);
	//Dar valores a los parametros
	$nombre = $_POST['nombre'];
	$resultado = $stmtPDO->execute(array(':nombre' => $nombre));
	if(!$resultado){
		die ("No se puede realizar la consulta $conexion->errno: $conexion->error");
	}
	else if($stmtPDO->rowCount() == 0){
		die("<center><br><br><br><br><h1>¡¡No existen filas!!</h1>");
	}
	// Mostramos una tabla con el resultado de la inserción
	echo "<center><h1>CLIENTES</h1><br><br>";
	echo "<center><table border=2><tr><th>DNI</th> <th>Nombre cliente</th> <th>Tlf</th> <th>Direccion</th></tr>";
	while($registro = $stmtPDO->fetch(PDO::FETCH_ASSOC)) {
		echo "<tr>";
		echo "<td>".$registro['dni']."</td>";
		echo "<td>".$registro['nombre']."</td>";
		echo "<td>".$registro['direccion']."</td>";
		echo "<td>".$registro['tlf']."</td>";
		echo "</tr>";
	}
?>
