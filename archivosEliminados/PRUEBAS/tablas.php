<?php
	require '../conexion.php';
	$conexion->set_charset('utf8'); //establece el conjunto de caracteres en la conexión, para que no haya problema de acentos y ñ de los campos

	$sql2 = "SELECT * FROM factura";
	$resultado2 = $conexion->query($sql2);
	if (!$resultado2) {
	die("No se puede realizar la consulta $conexion->errno: $conexion->error");
	}
	// Mostramos una tabla con el resultado de la inserción
	echo "<center><h1>TABLA FACTURA</h1><br><br>";
	echo "<center><table border=2><tr><th>Numero Factura</th> <th>Cantidad</th> <th>Fecha Pedido</th> <th>Precio</th> <th>Fecha Pago</th> <th>Codigo articulo</th> <th>Codigo cliente</th></tr>";
	while($registro = $resultado2->fetch_assoc()) {
		echo "<tr>";
		echo "<td>".$registro['nf']."</td>";
		echo "<td>".$registro['ctd']."</td>";
		echo "<td>".$registro['fecha']."</td>";
		echo "<td>".$registro['precio']."</td>";
		echo "<td>".$registro['pagada']."</td>";
		echo "<td>".$registro['coda']."</td>";
		echo "<td>".$registro['codc']."</td>";
		echo "</tr>";
	}
	echo "</table>";

	$sql1 = "SELECT * FROM articulo";
	$resultado1 = $conexion->query($sql1);
	if (!$resultado1) {
	die("No se puede realizar la consulta $conexion->errno: $conexion->error");
	}
	// Mostramos una tabla con el resultado de la inserción
	echo "<center><h1>TABLA ARTICULO</h1><br><br>";
	echo "<center><table border=2><tr><th>Codigo</th> <th>Nombre</th> <th>PVP</th> <th>Color</th> <th>Cantidad</th> <th>IVA</th></tr>";
	while($registro = $resultado1->fetch_assoc()) {
		echo "<tr>";
		echo "<td>".$registro['coda']."</td>";
		echo "<td>".$registro['nombre']."</td>";
		echo "<td>".$registro['pvp']."</td>";
		echo "<td>".$registro['color']."</td>";
		echo "<td>".$registro['ctd']."</td>";
		echo "<td>".$registro['iva']."</td>";
		echo "</tr>";
	}
	echo "</table>";

	$sql = "SELECT * FROM cliente";
	$resultado = $conexion->query($sql);
	if (!$resultado) {
	die("No se puede realizar la consulta $conexion->errno: $conexion->error");
	}
	// Mostramos una tabla con el resultado de la inserción
	echo "<center><h1>TABLA CLIENTE</h1><br><br>";
	echo "<center><table border=2><tr><th>Codigo</th> <th>DNI</th> <th>Nombre</th> <th>Direccion</th> <th>tlf</th></tr>";
	while($registro = $resultado->fetch_assoc()) {
		echo "<tr>";
		echo "<td>".$registro['codc']."</td>";
		echo "<td>".$registro['dni']."</td>";
		echo "<td>".$registro['nombre']."</td>";
		echo "<td>".$registro['direccion']."</td>";
		echo "<td>".$registro['tlf']."</td>";
		echo "</tr>";
	}
	echo "</table>";
	/* O bien podemos recorrer campo a campo del registro con foreach
	echo"<tr>";
	foreach ($registro as $campo)
	echo "<td>".$campo."</td>";
	echo "</tr>"; */
?>
