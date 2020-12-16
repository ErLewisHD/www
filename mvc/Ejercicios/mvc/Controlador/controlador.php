<?php
  require '../Modelo/modelo.php';
  function obtenerRegistros($DNI){
    $registros = new Funciones();
    $resultado = $registros->ejercicio2($DNI);
    return $resultado;
  }
?>
