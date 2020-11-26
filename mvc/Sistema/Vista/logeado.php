<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href="../../css/login1.css">
	<title>Inicio de sesión de un cliente</title>
	<meta charset=utf-8 />
</head>

<body align='center'>
<style>
input[type=submit],input[type=reset], input[type=button]{
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

<div class="login-page">
  <div class="form">
		<h2 align='center'>Iniciar sesión</h2>
    <form action="../Controlador/login.php" method="post" class="login-form">
      <input type="text" NAME="dni" pattern="^[0-9]{8}[a-zA-Z]{1}$" title="Formato incorrecto, por favor introduzca su dni del tipo: 44556677A"
	  placeholder="Introduza su DNI" required />
      <input type="password" NAME="password" placeholder="Contraseña" required />
      <input type="submit" value="Acceder"/> <input type="button" value="Cancelar" onclick="redirectIndex()"/>
      <p class="message">¿No tienes una cuenta con nosotros? <a href="./registro">Regístrarse</a></p>
    </form>
  </div>
</div>

<script>
function redirectIndex(){
	location.replace('./index');
}
</script>

</body>
</html>

<?php
$resultado= $usuario->execute();

if (!$resultado) {
  die ("Error en la consulta");
}
else if($usuario->rowCount() == 0){
  echo '<center><br><br><br><br>El usuario no está registrado';
}
else {
  $registro = $usuario->fetch(PDO::FETCH_ASSOC);
  $pass = sha1($_POST['password']);

  if ($pass == $registro['password']) {
    $_SESSION['usuario'] = $registro['nombre'];
    header("Location: http://localhost/mvc/Sistema/Vista/index");
  } else {
    echo '<center><br><br><br><br>Contraseña incorrecta';
    echo "<li class='nav-item'>
      <a class='nav-link' href='../Vista/login.html'>Volver a intentar</a>
    </li>";
  }
}
 ?>
