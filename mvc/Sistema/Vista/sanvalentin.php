<!DOCTYPE html>
<html lang="es">
<head>
  <title>Party Flowers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../../lib/scripts.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body background='../../img/coraoscuro.jpg' WIDTH=1000 HEIGHT=10000>

  <?php
    session_start();
    if(!isset($_SESSION['usuario'])){
      header('Location: ./index.php');
    }
   ?>

  <div class="jumbotron text-center" style="background-image: url('../../img/floresfondo.jpg'); background-size: 40% 110%; margin-bottom:auto;">
    <h1>Party Flowers S.A.</h1>
    <p>Tu floristeria online, y cada vez la de más gente</p>

  </div>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="nav-link" href="./index.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="./ramos1.php">Ramos</a>
        </li>
        <li class="nav-item">
          <a class="navbar-brand" href="./sanvalentin.php">San Valentín</a>
        </li>
        <button onclick='logout()'>Cerrar sesion</button>
      </ul>
    </div>
  </nav>
  <?php
    if(isset($_SESSION['usuario'])){
      echo "<p style='color:#fafbfd'>Has iniciado sesión como: " .$_SESSION['usuario'] ."</p>";
    }
   ?>

<br>
<div class="text-center" >
  <h2><font color="white">Algunos de nuestros mejores productos son:</font></h2>
  <br>
<h3><font color="white">Osito:</font></h2>
  <img src='../../img/osito.jpg' WIDTH=600 HEIGHT=1000</img>
</div>

<div class="text-center">
  <br><br>
  <h2><font color="white">Flores con corazon:</font></h2>
  <img src='../../img/florecora.jpg' WIDTH=600 HEIGHT=600</img>
</div>

<div class="text-center">
  <br><br><br>
  <h2><font color="white">Flores con oso</font></h2>
  <img src='../../img/osoflore.png' WIDTH=1000 HEIGHT=1000</img>
</div>

<div class="jumbotron text-center" >
  <br>
  <h3 >NOTA:Consultar disponibilidad en tienda.
      Si desea uno de estos o más personalizado, llámanos o ve a tienda.
      Gracias.
  </h3>
  <body>
</div>
<audio controls loop WIDTH=30 HEIGHT=30>
    <source  src="../../music/sanValentin.mp3" type="audio/mp3">
</audio>


<footer  class="jumbotron text-center" style="margin-bottom:0" >
  <span align="center" class="ir-arriba icon-arrow-up2"></span><br><br>

  <br><br>


  <table  style="margin: 0 auto;">
  <tr>
    <td><strong>Contáctanos &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</strong></td>
    <td><strong>¡Siguenos! &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</strong></td>
    <td><strong>Políticas y seguridad &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</strong></td>
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




</body>
</html>
