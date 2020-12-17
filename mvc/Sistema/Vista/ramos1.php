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
      die("No puedes acceder");
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
          <a class="nav-link" href="./sanvalentin.html">San Valentín</a>
        </li>

        <form>
          <input type="text" name="search" placeholder="Search..">
        </form>
        <button onclick='logout()'>Cerrar sesion</button>
      </ul>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-9">
        <div class="table-responsive">
          <table id="catalogo" class="table table-bordered">
          </table>
        </div>
      </div>
      <div class="col-3">

        <br>
        <h3>Escoge tipo y color</h3>
        <br>
        <div class="btn-group-vertical" >
          <div class="btn-group">
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
              Ramos
            </button>
            <div class="dropdown-menu">
              <button class="dropdown-item" onclick="filtrar('ramo', 'Todos')">Todos</button>
              <button class="dropdown-item" onclick="filtrar('ramo', 'blanco')">Blanco</button>
              <button class="dropdown-item" onclick="filtrar('ramo', 'rojo')">Rojo</button>
            </div>
          </div>
          <div class="btn-group">
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
              Centros
            </button>
            <div class="dropdown-menu">
              <button class="dropdown-item" onclick="filtrar('centro', 'Todos')">Todos</button>
              <button class="dropdown-item" onclick="filtrar('centro', 'blanco')">Blanco</button>
              <button class="dropdown-item" onclick="filtrar('centro', 'rojo')">Rojo</button>
              <button class="dropdown-item" onclick="filtrar('centro', 'variado')">Variado</button>
            </div>
          </div>
          <div class="btn-group">
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
              Coronas
            </button>
            <div class="dropdown-menu">
              <button class="dropdown-item" onclick="filtrar('corona', 'Todos')">Todos</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <ul  class="pagination justify-content-center">
      <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
      <li class="page-item active"><a class="page-link" href="./ramos1.html">1</a></li>
      <li class="page-item"><a class="page-link" href="./ramos2.html">2</a></li>
      <li class="page-item"><a class="page-link" href="./ramos2.html">Siguiente</a></li>
    </ul>
  </div>

  <button id="botonPublicidad" onclick="esconderPublicidad()">Esconder publicidad</button>
  <p id="imagenPublicidad"> <img src="https://www.apuestasdeportivas.pe/wp-content/uploads/sites/3/2019/08/f0ea6f91b10b6ed420d2cc04b8c73e62.jpg" onclick="bigImg(this)" onmouseout="normalImg(this)" alt="Publicidad"> </p>

  <footer class="jumbotron text-center" style="margin-bottom:0">
    Pie de página
  </footer>
  <audio autoplay loop>
      <source  src="../../music/musica_ramos.mp3" type="audio/mp3">
  </audio>
</body>
</html>
