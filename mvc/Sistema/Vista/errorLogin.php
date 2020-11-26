<?php
$resultado= $usuario->execute();

if (!$resultado) {
  die ("Error en la consulta");
}
else if($usuario->rowCount() == 0){
  echo '<center><br><br><br><br>El usuario no está registrado';
	echo "<li class='nav-item'>
		<a class='nav-link' href='../Vista/login.html'>Volver a Inicio Sesión</a>
	</li>";
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
