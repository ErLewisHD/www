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

      private $bd;

      public function __construct(){
        require 'conexionPDO.php';
        $this->bd= $conexionPDO;
      }

      public function catalogoXML(){

          //consultas
          $sql = "SELECT * FROM articulo WHERE ctd > 0";
          $bdArticulos = $this->bd->prepare($sql);

          //buscar los articulos
          $bdArticulos->execute();
          $articulos = $bdArticulos->fetchAll(PDO::FETCH_ASSOC);


          $x = new XMLWriter();
          $x -> openMemory();
          $x -> startDocument('1.0','UTF-8');
          $x -> startElement('flores');

          foreach ($articulos as $articulo) {

            $x -> startElement('articulo');
            $x -> writeElement('nombre',$articulo['nombre']);
            $x -> writeElement('precio',$articulo['pvp']);
            $x -> endElement();//articulo
          }
          $x->endElement();//flores
          $x->endDocument();
          $xml = $x->outputMemory();

          //escribimos y creamos documento
          $file = fopen("catalogo.xml", "w");
          fwrite($file,$xml);
          fclose($file);
    }
}

class Factura{

};


 ?>
