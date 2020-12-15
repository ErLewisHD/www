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

function registerController($dni, $pass, $nombre, $dir, $prefijo, $tlf, $recaptchaResponse, $serverRemoteAddr){
  $NewUser = new Cliente();
  //Comprobamos el reCAPTCHA
  $checkReCaptcha = $NewUser -> checkreCaptcha($serverRemoteAddr,$recaptchaResponse);
  //Creamos el usuario
  if($checkReCaptcha != null && $checkReCaptcha->success){
    $resultado = $NewUser -> newUser($dni, $pass, $nombre, $dir, $prefijo, $tlf);
    return $resultado;
  }
  else{
    return 100;
  }

}

function crearCatalogoXML(){
  $catalogo = new Articulo();
  $resultado = $catalogo -> catalogoXML();
  if($resultado == 404){
    return 404;
  }
  else if($resultado == 0){
    return 0;
  }
}

function comprarController($coda){
  $comprar= new Articulo();
  $articulo = $comprar -> getArticulo($coda);

  return $articulo;
}

function crearFactura($cantidad, $direction, $articulo){
  $factura= new Factura();

  $ctd= htmlentities(addslashes($cantidad));
  $direccion= htmlentities(addslashes($direction));

  $salida = $factura -> crear($cantidad, $direccion, $articulo);
  if($salida == '404' || $salida == '1' || $salida == '2'){
    header('Location: ./error.html');
  }
  else {
    return 0;
  }

}

?>
