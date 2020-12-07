<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href="../../css/registro.css">
	<title>Registro de un nuevo cliente</title>
	<meta charset=utf-8 />
</head>
<body>
<style>
input[type=submit],input[type=reset],input[type=button]{
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
</style>

<?php
	require '../Controlador/controlador.php';

	if(isset ($_POST["dni"]) && isset ($_POST["password"]) && isset ($_POST["nombre"])
	&& isset ($_POST["direccion"]) && isset ($_POST["prefijo"]) && isset ($_POST["telefono"])){

		$resultado = registerController($_POST["dni"], $_POST["password"], $_POST["nombre"],
		$_POST["direccion"], $_POST["prefijo"], $_POST["telefono"]);

		if($resultado == 1){
	    header('Location: ./error.html');
	  }
	  else if($resultado == 0){
	    header('Location: ./login.php');
	  }
	}
?>

<div class="sing_up-page">
	<div class="form">
		<h1 align='center'>Registrarme</h1>
		<form class="register-form" ACTION="" METHOD="post">
			<input type="text" size="40" maxlength="60" NAME="nombre" placeholder="Nombre y Apellidos" required /><br><br>
			<input type="text" NAME="dni" pattern="^[0-9]{8}[a-zA-Z]{1}$"
			title="Formato incorrecto, por favor introduzca su dni del tipo: 44556677A" placeholder="Introduzca su DNI" required /><br><br>
			<input onmouseover="this.style.display='La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
			NO puede tener otros símbolos.';" type="password" id="password" NAME="password" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$"
			title="La contraseña debe tener entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
			NO puede tener otros símbolos." placeholder="Contraseña de acceso" required /><br><br>
			<input type="password" id="password2" placeholder="Repita la contraseña" required /><br><br>
			<input type="text" NAME="direccion" size="64" placeholder="Calle/Avenida....,nº" required /><br><br>
			Seleccione su prefijo <select NAME="prefijo">
			<option value="+34">+34</option><option value="+1">+1</option><option value="+33">+33</option><option
			value="+39">+39</option> <input type="text" name="telefono" pattern="^[0-9]{9}$"
			title="Formato incorrecto, por favor introduzca su tlf del tipo: 666555111" placeholder="Teléfono de contacto" required /><br><br>
			</select>
			<input type="submit" value="Enviar"/> <input type="button" value="Cancelar" onclick="redirectIndex()"/>
		</form>
	</div>
</div>

<script>
	var p1 = document.getElementById("password");
	var p2 = document.getElementById("password2");

	p2.onblur = function(){
		if(!p1.value.match(p2.value)) {
			alert("Las contraseñas no coinciden");
			return false;
		} else {
		  return true;
		}
	}

	function redirectIndex(){
		location.replace('./index.php');
	}
</script>

</body>
</html>
