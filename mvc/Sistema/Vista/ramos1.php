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
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>


<?php
  require '../Controlador/controlador.php';
  session_start();
  if(!isset($_SESSION['usuario'])){
    die("No puedes acceder");
  }

  $resultado = crearCatalogoXML();
  if($resultado == 404){
    header('Location: ./error.html');
  }
  else if($resultado == 0){
    header('Location: ./index.php');;
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
        <a class="nav-link" href="#">Centros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./sanvalentin.html">San Valentín</a>
      </li>


      <head>
      <style>
      input[type=text] {
        width: 530px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 15px;
        background-color: white;
        background-image: url('searchicon.png');
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
      <form>
        <input type="text" name="search" placeholder="Search..">
      </form>

      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;

      <button onclick='logout()'>Cerrar sesion</button>
      </body>
    </ul>
  </div>
</nav>


<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>

<script>
function logout(){
  location.replace('../Modelo/logout.php');
}
</script>

<script>
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel2").slideToggle("slow");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel3").slideToggle("slow");
  });
});
</script>

<script>
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel4").slideToggle("slow");
  });
});
</script>
<style>
#panel,#panel2,#panel3,#panel4,#flip {
  padding: 5px;
  text-align: center;
  background-color: #e5eecc;
  border: solid 1px #c3c3c3;
}

#panel,#panel2,#panel3,#panel4 {
  padding: 5px;
  display: none;
}
</style>
</head>
<body>

<div id="flip">Filtro para búsqueda:</div>
<div id="panel">Mas vendidos! </div>
<div id="panel2">Mejor valorados!</div>
<div id="panel3">De menor a mayor precio!</div>
<div id="panel4">De mayor a menor precio!</div>

</body>

<br>
</br>

<center>
<section>
  <article> <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="../../img/ramo1.jpg" alt="ramo2"> </article>
  <aside>
    Ramo de flores de la leche pa to los gustos jejejej ete sech
    <div class="input-group input-group-sm">
      <span class="input-group-addon">Cant.</span>
      <input type="text" class="form-control" placeholder="cantidad">
    </div>
  </aside>

  <a class="button" href="./Comprar">Comprar</a>

  <br></br>

</section>

<section>
  <article> <img src="../../img/ramo2.jpg" onmouseover="bigImg(this)" onmouseout="normalImg(this)" alt="ramo2"> </article>
  <aside>
      Son de amores (son de amores)
      Amores que matan
      Amores que ríen
      Amores que lloran
      Amores que amargan
      Son de amores (son de amores)
      Amores que engañan
      Amores que agobian
      Amores que juegan
      Amores que faltan
      Ah-ah-ah-ah

      <div class="input-group input-group-sm">
        <span class="input-group-addon">Cant.</span>
        <input type="text" class="form-control" placeholder="cantidad">
      </div>
  </aside>
  <button>Comprar</button>
  <br></br>
</section>
</center>
<div class="container">

  <ul  class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
    <li class="page-item active"><a class="page-link" href="./ramos1.html">1</a></li>
    <li class="page-item"><a class="page-link" href="./ramos2.html">2</a></li>
    <li class="page-item"><a class="page-link" href="./ramos2.html">Siguiente</a></li>
  </ul>
</div>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("p").hide(1000);
    alert("La publicidad ahora está oculta");
  });
});
</script>
</head>
<body>

<button>Esconder publicidad</button>

<p> <img src="https://www.apuestasdeportivas.pe/wp-content/uploads/sites/3/2019/08/f0ea6f91b10b6ed420d2cc04b8c73e62.jpg" onmouseover="bigImg(this)" onmouseout="normalImg(this)" alt="Publicidad"> </p>

</body>


<footer class="jumbotron text-center" style="margin-bottom:0">
  Pie de página
</footer>

<audio autoplay loop>
    <source  src="../../music/musica_ramos.mp3" type="audio/mp3">
</audio>

<script>
function bigImg(x) {
  x.style.height = "400px";
  x.style.width = "400px";
}

function normalImg(x) {
  x.style.height = "250px";
  x.style.width = "250px";
}
</script>

</body>
</html>
