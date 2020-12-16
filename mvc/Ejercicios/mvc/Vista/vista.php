<?php
	require '../Controlador/controlador.php';
  //Ejercicio 1
	if(!isset($_GET["numero"]) && !isset($_GET["DNI"])){
    echo "<h3 align='center'>Error, algun campo no ha sido rellenado</h3><br><br>";
		echo '
		<form align="center" action = "" method ="get">
			Numero: <input type = "number" name="numero" required>
			DNI: <input type = "text" name="DNI" pattern="^[0-9]{8}[A-Z]$" required>
			<input type="submit" value="Enviar">
			<input type="reset" value="Borrar">
		</form>
		';
	}
	else{
		$registros = obtenerRegistros($_GET["DNI"]);
		if($registros == null){
			echo '<br>Error en la consulta en la BBDD';
		}
		else{
			echo "<center><h1>TABLA EXAMEN</h1><br><br>";
    	echo "<center><table border=2><tr><th>DNI</th> <th>Columna 1</th></tr>";
			while($registro = $registros->fetch(PDO::FETCH_ASSOC)) {
    		echo "<tr>";
    		echo "<td>".$registro['DNI']."</td>";
        echo "<td>".$registro['Columna1']."</td>";
    		echo "</tr>";
    	}
		}
	}

	//Ejercicio 3
	if(isset($_COOKIE["contador"])){
    setcookie("contador", $_COOKIE["contador"] + 1);
    echo "<br>Accesos a la página: ".$_COOKIE["contador"];
  }
  else{
    echo '<h1 align="center">Bienvenido por primera vez</h1>';
    setcookie("contador", 1);
  }
  if(isset($_COOKIE["ultimoAcceso"])){
    $fechaActual = new DateTime(date("H:i:s"));
    $interval = $fechaActual->diff(new DateTime($_COOKIE["ultimoAcceso"]));
    echo "<br>El ultimo acceso ha sido hace: ".$interval->format('%s segundos');
    setcookie("ultimoAcceso",date("H:i:s"));
  }
  else{
    setcookie("ultimoAcceso",date("H:i:s"));
    echo "cookie nueva<br>";
  }
?>
