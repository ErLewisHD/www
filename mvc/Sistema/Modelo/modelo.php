<?php

class Cliente{
  private $bd;
  public $error;

  public function __construct(){
    require 'conexionPDO.php';
    $this->bd= $conexionPDO;
    session_start();
  }

  public function getUsuario($dni){
    $sql = "SELECT * FROM cliente WHERE dni = :dni";
    $stmtPDO = $this->bd->prepare($sql);
    $resultado = $stmtPDO->execute(array(':dni' => $dni));
    //La consulta ha fallado
    if (!$resultado) {
      return 404;
    }
    //No existe el usuario
    else if($stmtPDO->rowCount() == 0){
      return 1;
    }
    //La consulta ha ido bien, devolvemos los campos del usuario
    else {
      return ($stmtPDO->fetch(PDO::FETCH_ASSOC));
    }
  }

  public function comprobarContraseña($usuario,$password){
    $pass = sha1($password);
    //La contraseña es correcta para el usuario introducido
    if ($pass == $usuario['password']) {
      $_SESSION['usuario'] = $usuario['nombre'];
      return 0;
    //Contraseña incorrecta para el usuario introducido
    } else {
      return 1;
    }
  }
};

class Artiuclo{

};

class Factura{

};


 ?>
