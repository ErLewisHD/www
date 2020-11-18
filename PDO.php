<?php
	//Dia y hora actual con cookies
	setcookie("fechaActual",date("d M y"));
	echo "Fecha actual: ".$_COOKIE["fechaActual"];
	//Dia y hora ultimo acceso con cookies
	if(isset($_COOKIE["fechaUltAcceso"])){	
		echo "<br>Fecha ultimo acceso: ".$_COOKIE["fechaUltAcceso"];
		setcookie("fechaUltAcceso",date("d M y  H:i:s"));
	}
	else{
		echo "Eres el primer acceso";
		setcookie("fechaUltAcceso",date("d ").date(" M").date(" y").date(" H:").date("i:").date("s"));
	}
	//Contador accesos a la página
	if(isset($_COOKIE["contador"])){ 
		//La cookie caduca cada 10 minutos
		setcookie("contador", $_COOKIE["contador"] + 1, time() + 60 * 10);
	} 
	else{
		setcookie('contador', 1, time() + 60 * 10);
	} 
	echo "<br>Accesos a la página: ".$_COOKIE["contador"];
	
	require 'conexionPDO.php';
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