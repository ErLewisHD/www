<?php
  class Funciones{
    private $conexionPDO;

    public function __construct(){
      try{
        $conexionPDO= new PDO("mysql:host=localhost; dbname=tablaexamen; charset=utf8", "root","");
        $conexionPDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this->conexionPDO = $conexionPDO;
      }catch(Exception $e) {
        echo "Error en la conexion";
        exit;
      }
    }

    function ejercicio2($DNI){
    	//Sql con marcadores
    	$sql = "SELECT DNI, Columna1 FROM tablaexamen WHERE  DNI = :DNI";
    	//Preparar
    	$stmtPDO = $this->conexionPDO->prepare($sql);
    	$resultado = $stmtPDO->execute(array(':DNI' => $DNI));
    	if(!$resultado){
    		die ("No se puede realizar la consulta $conexion->errno: $conexion->error");
        return null;
    	}
      else{
        return $stmtPDO;
      }
    }
  }
?>
