<?php
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
