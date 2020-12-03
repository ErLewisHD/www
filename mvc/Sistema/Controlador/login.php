<?php
require '../Modelo/modelo.php';
$login= new Cliente();
$usuario = $login->getUsuario($_POST["dni"]);
$salida = 1;
if($usuario != 1 && $usuario != 2){
  $salida = $login->comprobarContraseña($_POST["password"]);
}
require '../Vista/errorLogin.php';

?>
