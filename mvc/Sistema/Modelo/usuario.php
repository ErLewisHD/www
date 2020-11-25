<?php
require './conexionPDO.php';

function login(){
  session_start();
  //Sql con marcadores
  $sql = "SELECT * FROM cliente WHERE dni=:dni";
  //Preparar
  $stmtPDO = $conexionPDO->prepare($sql);
  //Obtenemos los valores para los parametros
  $dni = $_POST['dni'];
  $pass = sha1($_POST['password']);
  $resultado = $stmtPDO->execute(array(':dni' => $dni));
}


 ?>
