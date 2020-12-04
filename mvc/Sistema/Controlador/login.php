<?php
require '../Modelo/modelo.php';

function loginController($dni,$pass){
  $login = new Cliente();
  $usuario = $login->getUsuario($dni);
  if($usuario != 1 && $usuario != 2){
    return $login->comprobarContraseña($usuario,$pass);
  }
  else return $usuario;
}
?>
