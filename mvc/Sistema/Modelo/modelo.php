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

  public function checkreCaptcha($serverRemoteAddr,$recaptchaResponse){
    //Librería de reCAPTCHA
    require_once "recaptchalib.php";
    //Mi clave secreta para el reCaptcha
    $secret = "6LfpfwMaAAAAANrs7BNMLnpi5q1xrkh-X-p6qaqi";
    //Comprobar la clave secreta
    $reCaptcha = new ReCaptcha($secret);
    //Para guardar el POST del reCapcthca (inicializamos a null)
    $response = null;
    //Comprobamos el POST
    if ($recaptchaResponse) {
      $response = $reCaptcha->verifyResponse($serverRemoteAddr,$recaptchaResponse);
    }

    return $response;
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

  public function getCodByNombre($nombre){
    $sql = "SELECT codc FROM cliente WHERE nombre = :nombre";
    $stmtPDO = $this->bd->prepare($sql);
    $resultado = $stmtPDO->execute(array(':nombre' => $nombre));
    //La consulta ha fallado
    if (!$resultado) {
      return 404;
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

      public function getArticulo($coda){
        $sql = "SELECT * FROM articulo WHERE coda = :coda";
        $stmtPDO = $this->bd->prepare($sql);
        $resultado = $stmtPDO->execute(array(':coda' => $coda));
        //La consulta ha fallado
        if (!$resultado) {
          return 404;
        }
        //La consulta ha ido bien, devolvemos los campos del articulo
        else {
          return ($stmtPDO->fetch(PDO::FETCH_ASSOC));
        }
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
            $x -> writeElement('coda',$articulo['coda']);
            $x -> writeElement('nombre',$articulo['nombre']);
            $x -> writeElement('precio',$articulo['pvp']);
            $x -> writeElement('color',$articulo['color']);
            $x -> writeElement('cantidad',$articulo['ctd']);
            $x -> writeElement('iva',$articulo['iva']);
            $x -> writeElement('tipo',$articulo['tipo']);
            $x -> writeElement('foto',$articulo['foto']);

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
  private $bd;

  public function __construct(){
    require 'conexionPDO.php';
    $this->bd= $conexionPDO;
  }

  public function crear($cantidad, $direccion, $articulo){

    $precio= $cantidad*$articulo['pvp'];
    $cliente = new Cliente();
    $codc= $cliente -> getCodByNombre($_SESSION['usuario']);

    if(codc != 404){
      //Consulta
    	$sql = "INSERT INTO factura VALUES (NULL, :cantidad, :fecha, :precio, :pagada, :coda, :codc)";

      $stmtPDO = $this->bd->prepare($sql);
      $resultado = $stmtPDO->execute(array(':cantidad' => $cantidad, ':fecha' => date("Y-m-d"), ':precio' => $precio,':pagada'=> date("Y-m-d"), ':coda' => $articulo['coda'], ':codc' => $codc));
    	if (!$resultado) {
        return 1;
    	}
    	else{
        $actu = "UPDATE articulo SET ctd=(ctd- :ctd) WHERE coda= :coda";

        $stmtPDO = $this->bd->prepare($sql);
        $result = $stmtPDO->execute(array(':coda' => $articulo['coda'], ':ctd' => $cantidad));
        if(!result){
          return 2;
        }else{
          return 0;
        }
    	}

    }else{
      return 404;
    }

  }

};


 ?>
