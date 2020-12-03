<?php
require conexion.php;
$stmtPDO = NULL;
class Cliente{
  private $bd;
  private $pass;

  public function __construct(){
    require 'conexionPDO.php';
    $this->bd= $conexionPDO;
    session_start();
  }

  public function getUsuario($dni){
    $sql = "SELECT * FROM cliente WHERE dni=:dni";

    global $stmtPDO;
    $stmtPDO = $this->bd->prepare($sql);
    global $resultado = $stmtPDO->execute(array(':dni' => $dni));

    if (!$resultado) {
      $salida= 1;
    }
    else if($stmtPDO->rowCount() == 0){
      $salida =2;
    }
    else {
      $salida = $resultado;
    }

    return $salida;
  }

  public function comprobarContraseña($password){
    global $stmtPDO;
    $registro = $stmtPDO->fetch(PDO::FETCH_ASSOC);
    $pass = sha1($password);

    if ($pass == $registro['password']) {
      $_SESSION['usuario'] = $registro['nombre'];
      $salida = 0;
    } else {
      $salida = 1;
    }

    return $salida;
  }
};

class Artiuclo{

};

class Factura{

};


 ?>
