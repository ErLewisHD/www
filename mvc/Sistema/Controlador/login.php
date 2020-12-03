<?php
function loginController($dni,$pass){
require '../Modelo/modelo.php';
$login= new Cliente();
$usuario = $login->getUsuario($dni);
$salida = 1;
if($usuario != 1 && $usuario != 2){
  $salida = $login->comprobarContraseña($pass);
}
return $salida;
}
?>
