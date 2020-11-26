<?php
require '../Modelo/login.php';
$login= new login_modelo();
$usuario = $login->getUsuario($_POST["dni"]);
require '../Vista/logeado.php'

?>
