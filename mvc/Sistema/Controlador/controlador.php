<?php
require '../Modelo/modelo.php';

function loginController($dni,$pass){
  $login = new Cliente();
  $usuario = $login->getUsuario($dni);
  //La consulta no falla (404) y el usuario esta en la BBDD
  if($usuario != 404 && $usuario != 1){
    //Comprueba que la contraseña es correcta
    //  0: Contraseña correcta
    //  1: Contraseña incorrecta
    return $login->comprobarContraseña($usuario,$pass);
  }
  else{
    //La consulta falla (return 404)
    //El usuario no esta en la BBDD (return 1)
    return $usuario;
  }
}

function registerController($dni, $pass, $nombre, $dir, $prefijo, $tlf){
  $NewUser = new Cliente();
  $resultado = $NewUser -> newUser($dni, $pass, $nombre, $dir, $prefijo, $tlf);
  return $resultado;
}

?>
