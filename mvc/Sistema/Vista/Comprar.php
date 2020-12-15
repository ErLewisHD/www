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

<div class="jumbotron text-center" style="background-image: url('../../../img/floresfondo.jpg'); background-size: 40% 110%; margin-bottom:auto;">
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
        <a class="nav-link" href="./ramos1">Ramos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Centros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./sanvalentin">San Valentín</a>
      </li>
    </ul>
  </div>
</nav>

<a id="p1" class="nav-link" href="./ramos1">Volver atrás</a>

<?php
  require '../Controlador/controlador.php';
  $articulo = comprarController($_GET["coda"]);
  if($articulo == '404'){
    header('Location: ./error.html');
  }
?>

<center>
<section>

  <aside>
    --INFORMACIÓN ACERCA DEL PRODUCTO
    <br></br>
    <?php
      echo '<img src="../../img/'.$articulo['foto'].'" alt="Foto ramo" width="500" height="500"><br>';
      echo "<br><h4>".$articulo['nombre']."</h4>";
      echo "<p>Color ".$articulo['color']."</p>";
      echo "<p>Tipo: ".$articulo['tipo']."</p>";
      echo "<p>Cantidad disponible: ".$articulo['ctd']."</p>";
      echo "<p>Precio: ".$articulo['ctd'].".  Iva aplicado: ".$articulo['iva']."</p>";
    ?>

    <?php
  		require '../Controlador/controlador.php';
  		if(isset ($_POST["ctd"]) && isset ($_POST["direccion"])){
  			$salida = crearFactura($_POST["ctd"], $_POST["direccion"], $_POST["articulo"]);

  			if($salida == '0'){
  				echo "<p id='exito'></p>";
  			}

  		}
  	?>

    <form id="formulario" action="/Comprar.php" method="post">
      <label for="cantidad">Introduce cantidad: </label>
      <input type="text" id="cantidad" name="ctd" value="1" required><br>
      <label for="direccion">Introduce direccion de entrega:</label>
      <input type="text" id="direccion" name="direccion" placeholder="Dirección" required><br><br>
      <input type="hidden" value="<?php $articulo ?>" name="articulo">
      <input type="submit" value="Finalizar compra">
    </form>

    <h3 id="mensajeExito" style="display:none">Pedidos realizado con éxito!!</h3><br>

    <div class="input-group input-group-sm">
      <span class="input-group-addon">Introduce la cantidad </span>
      <input type="text" class="form-control" placeholder="cantidad">
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      $("#").mouseleave(function(){
        alert("Pedido realizado con éxito!");
      });

      if(document.getElementById("exito")){
        document.getElementById("formulario").style.display = "none"
  		  document.getElementById("mensajeExito").style.display = "block";
  		}
    });
    </script>

    <br></br>
    * Atendemos por WhatsApp en el 678405363 todas sus dudas.
    <br></br>
    * Elige el dia de entrega de martes a sabado, No hay entregas domingo, lunes ni festivos.
    <br></br>
    * Haz tu pedido antes de las 16h y recíbelo al dia siguiente o el dia que tu elijas. Envío PRIORITARIO incluido en el precio. Entregas entre las 8 - 20h y en caso de ausencia se garantiza una segunda entrega.Los sábados entregas de 9 a 14h sin posibilidad de segunda entrega.
    <br></br>
    *Las flores se envían en una caja especial que las protege de cualquier daño y las mantiene ventiladas e hidratadas hasta que lleguen a su destino.
    Personaliza tu ramo con una dedicatoria, deja un mensaje con las flores, es gratuito.* Incluye sobre de conservante para prolongar la vida de las flores.
    <br></br>
    <a id="p1" class="nav-link" href="./ramos1.php">Volver atrás</a>

  </aside>

  <br></br>

</section>

</center>


</body>
</html>
