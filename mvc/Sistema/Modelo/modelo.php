<?php
require 'conexion.php';

class Cliente{
  public function __construct(){
    session_start();
  }

  public function getUsuario($dni){
    require 'conexionPDO.php';
    $sql = 'SELECT * FROM cliente WHERE dni = :dni';
    $stmtPDO = $conexionPDO->prepare($sql);
    $resultado = $stmtPDO->execute(array(':dni' => $dni));

    if (!$resultado) {
      return 2;
    }
    else if($stmtPDO->rowCount() == 0){
      return 1;
    }
    else {
      return $resultado;
    }
  }

  public function comprobarContraseña($usuario,$password){
    $pass = sha1($password);
    if ($pass == $usuario['password']) {
      $_SESSION['usuario'] = $usuario['nombre'];
      return 0;
    } else{
      return 1;
    }
  }
};

class Artiuclo{

};

class Factura{

};


 ?>
