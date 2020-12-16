<?php
    try{
      $conexionPDO= new PDO("mysql:host=localhost; dbname=tablaexamen; charset=utf8", "root","");
      $conexionPDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e) {
      echo "Error en la conexion";
      exit;
    }

  	//Sql con marcadores
  	$sql = "SELECT DNI, Columna1 FROM tablaexamen WHERE  DNI = :DNI";
  	//Preparar
  	$stmtPDO = $conexionPDO->prepare($sql);
  	//Dar valores a los parametros
    $DNI = '49429387H';
  	$resultado = $stmtPDO->execute(array(':DNI' => $DNI));
  	if(!$resultado){
  		die ("No se puede realizar la consulta $conexion->errno: $conexion->error");
  	}
  	else if($stmtPDO->rowCount() == 0){
  		die("<center><br><br><br><br><h1>¡¡No existen filas!!</h1>");
  	}
  	// Mostramos una tabla con el resultado de la inserción
  	echo "<center><h1>TABLA EXAMEN</h1><br><br>";
  	echo "<center><table border=2><tr><th>DNI</th> <th>Columna 1</th></tr>";
  	while($registro = $stmtPDO->fetch(PDO::FETCH_ASSOC)) {
  		echo "<tr>";
  		echo "<td>".$registro['DNI']."</td>";
      echo "<td>".$registro['Columna1']."</td>";
  		echo "</tr>";
  	}
?>
