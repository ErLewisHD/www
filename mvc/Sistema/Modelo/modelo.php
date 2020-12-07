<?php

class Cliente{
  private $bd;

  public function __construct(){
    require 'conexionPDO.php';
    $this->bd= $conexionPDO;
    session_start();
  }

  public function newUser($dni, $pass, $nombre, $dir, $prefijo, $tlf){
  	$passHash = sha1($pass);
    //Consulta
  	$sql = "INSERT INTO `cliente` (
  	`codc`, `dni`, `password`, `nombre`, `direccion`, `tlf`)
    VALUES (NULL, '$dni', '$passHash', '$nombre', '$dir', '$prefijo.$tlf');";

  	$resultado = $this->bd->query($sql);
  	if (!$resultado) {
      return 1;
  	}
  	else{
      return 0;
  	}
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

class Articulo{
  /*private $bd;

  public function __construct(){
    require 'conexionPDO.php';
    $this->bd= $conexionPDO;
  }

  public function exportCatalogXML(){
    $sql = "SELECT * FROM articulo FOR XML AUTO;"
    //$sql = "SELECT CONCAT('<row><nombre>',nombre,'</nombre>''<pvp>',pvp,'</pvp>''<color>',color,'</color></row>')
    //AS '<datos>' FROM articulo INTO OUTFILE '../Controlador/catalogoRamos.xml';";
    $resultado = $this->bd->query($sql);
    if (!$resultado) {
      return 404;
    }
    else{
      return 0;
    }
  */
}

class Factura{

};


 ?>
