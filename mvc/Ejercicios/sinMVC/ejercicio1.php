<?php
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
    echo "<div align='center'>Numero: ".$_GET['numero']."<br>";
		echo "DNI: ".$_GET['DNI']."<br></div>";
	}
  //Ejercicio 3
  require 'ejercicio3.php';
  //Ejercicio 2
  require 'ejercicio2.php';
?>
