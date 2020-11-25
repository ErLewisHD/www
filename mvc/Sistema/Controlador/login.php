<?php
require '../Modelo/usuario';

if (!$resultado) {
  die ("Error en la consulta");
}
else if($stmtPDO->rowCount() == 0){
  echo '<center><br><br><br><br>El usuario no está registrado';
}
else {
  $registro = $stmtPDO->fetch(PDO::FETCH_ASSOC);
  if ($pass == $registro['password']) {
    $_SESSION['usuario'] = $registro['nombre'];
    header("Location: http://localhost/mvc/Sistema/Vista/index");
  } else {
    echo '<center><br><br><br><br>Contraseña incorrecta';
  }
}

 ?>
