<!DOCTYPE html>
<html lang="es">
<head>
  <title>Party Flowers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="../../lib/filtros.css" rel="stylesheet" type="text/css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../../lib/scripts.js"></script>
  <style>
    .fakeimg {
      height: 200px;
      background: #aaa;
    }
    .btn-group-vertical{
      width: 350px;
      background-color:DodgerBlue;
      border-style: groove;
      border-width: 4px;
    }
    .btn{
      border-style: groove;
      border-width: 5px;
    }

    input[type=text] {
      width: 530px;
      box-sizing: border-box;
      border: 2px solid #ccc;
      border-radius: 4px;
      font-size: 15px;
      background-color: white;
      background-position: 10px 10px;
      background-repeat: no-repeat;
      padding: 12px 20px 12px 40px;
      transition: width 0.4s ease-in-out;
    }

    input[type=text]:focus {
      width: 100%;
    }


  </style>
</head>

<body>
  <?php
    require '../Controlador/controlador.php';
    session_start();
    if(!isset($_SESSION['usuario'])){
      header('Location: ./index.php');
    }

    $resultado = crearCatalogoXML();
    if($resultado == 404){
      header('Location: ./error.html');
    }

    if(isset($_POST['nombre'])){
      echo '<h1>$_POST["nombre"]</h1>';
    }
  ?>


  <div class="jumbotron text-center" style="background-image: url('../../img/floresfondo.jpg'); background-size: 40% 110%; margin-bottom:auto;">
    <h1>Party Flowers S.A.</h1>
    <p>Tu floristeria online, y cada vez la de más gente</p>
  </div>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="nav-link" href="./index">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="navbar-brand" href="./ramos1.php">Ramos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./sanvalentin.php">San Valentín</a>
        </li>
        <button onclick='logout()'>Cerrar sesion</button>
      </ul>
    </div>
  </nav>
  <?php
    if(isset($_SESSION['usuario'])){
      echo "<p>Nombre de usuario: " .$_SESSION['usuario'] ."</p>";
    }
   ?>

  <nav class="fitroNAV" id="filtrosNAV">
    <ul class="dropdown">
      <li class="drop"><a>Ramos</a>
        <ul class="sub_menu">
          <li><a onclick="filtrar('ramo', 'Todos')">Todos</a></li>
          <li><a onclick="filtrar('ramo', 'blanco')">Blancos</a></li>
          <li><a onclick="filtrar('ramo', 'rojo')">Rojos</a></li>
        </ul>
      </li>
      <li class="drop"><a>Centros</a>
        <ul class="sub_menu">
          <li><a onclick="filtrar('centro', 'Todos')">Todos</a></li>
          <li><a onclick="filtrar('centro', 'blanco')">Blancos</a></li>
          <li><a onclick="filtrar('centro', 'rojo')">Rojos</a></li>
          <li><a onclick="filtrar('centro', 'variado')">Variados</a></li>
        </ul>
      </li>
      <li class="drop"><a>Coronas</a>
        <ul class="sub_menu">
          <li><a onclick="filtrar('corona', 'Todos')">Todos</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <br>
  <br>
  <br>

  <div class="container-fluid">
    <div class="row">
      <div class="col-9">
        <div class="table-responsive">
          <br>
          <table id="catalogo" class="table table-bordered">
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <ul  class="pagination justify-content-center">
      <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
      <li class="page-item active"><a class="page-link" href="./ramos1.php">1</a></li>

      <li class="page-item"><a class="page-link" >Siguiente</a></li>
    </ul>
  </div>

  <button id="botonPublicidad" onclick="esconderPublicidad()">Esconder publicidad</button>
  <p id="imagenPublicidad"> <img src="https://www.apuestasdeportivas.pe/wp-content/uploads/sites/3/2019/08/f0ea6f91b10b6ed420d2cc04b8c73e62.jpg" onclick="bigImg(this)" onmouseout="normalImg(this)" alt="Publicidad"> </p>

  <footer  class="jumbotron text-center" style="margin-bottom:0" >
    <span align="center" class="ir-arriba icon-arrow-up2"></span><br><br>
    <br><br>


    <table  style="margin: 0 auto;">
    <tr>
      <td><strong>Contáctanos &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</strong></td>
      <td><strong>¡Siguenos! &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</strong></td>
      <td><strong>Información adicional &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</strong></td>
    </tr>

    <tr>
      <td> <img src='../../img/tlf.png' WIDTH=30 HEIGHT=30</img> 967809743 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td><img src='../../img/inst.png' WIDTH=40 HEIGHT=40</img> @partyflowers &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td> Términos y condiciones de uso &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
    </tr>

    <tr>
      <td> <img src='../../img/correo.png' WIDTH=40 HEIGHT=40</img> partyflowers@gmail.com &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td><img src='../../img/face.png' WIDTH=30 HEIGHT=30</img> partyflowers &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td> Nuestro equipo &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
    </tr>

    <tr>
      <td> <img src='../../img/ubi.png' WIDTH=40 HEIGHT=40</img> Avenida España, 47, 02002 Albacete &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td><img src='../../img/twi.png' WIDTH=30 HEIGHT=30</img> partyflowers &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td> Politicas de privacidad &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
    </tr>

    <tr>
      <td> </td>
      <td></td>
      <td><a href="http://www.interior.gob.es/politica-de-cookies"> Politicas de cookies</a></td>
    </tr>

    </table>

  </footer>
  <audio autoplay loop>
      <source  src="../../music/musica_ramos.mp3" type="audio/mp3">
  </audio>
</body>
</html>
