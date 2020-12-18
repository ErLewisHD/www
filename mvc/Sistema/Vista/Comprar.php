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
  <script src="../../lib/scripts.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  .ir-arriba {
    width:0px;
     height:0px;
     border-left:25px solid transparent; /* izquierda flecha */
     border-right:25px solid transparent; /* derecha flecha */
     border-bottom:25px solid #0A0A0A; /* base flecha y color*/
     font-size:0px;
     line-height:0px;
  }
  </style>
</head>

<body>
  <?php
    require '../Controlador/controlador.php';
    $articulo = comprarController($_GET["coda"]);
    if($articulo == '404'){
      header('Location: ./error.html');
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
          <a class="nav-link" href="./ramos1">Ramos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./sanvalentin">San Valentín</a>
        </li>
      </ul>
    </div>
  </nav>

  <center>
    <section>
      <aside>
        <h4>INFORMACIÓN ACERCA DEL PRODUCTO</h4>
        <?php
          echo '<img src="../../img/'.$articulo['foto'].'" alt="Foto ramo" width="500" height="500"><br>';
          echo "<br><h4>".$articulo['nombre']."</h4>";
          echo "<p>Color ".$articulo['color']."</p>";
          echo "<p>Tipo: ".$articulo['tipo']."</p>";
          echo "<p>Cantidad disponible: ".$articulo['ctd']."</p>";
          echo "<p>Precio 1 producto: ".$articulo['pvp']."€ </p>";

        	if(isset ($_POST["ctd"]) && isset ($_POST["direccion"])){
        		$salida = facturaController($_POST["ctd"], $_POST["direccion"], $_POST["articulo"]);

        		if($salida == '0'){
        			echo "<p id='exito'></p>";
        		}
        	}

          echo "<form id='formulario' action='pago.php' method='post'>
            Cantidad: <input type='number' name='cantidad' value='1' max='10' required/><br>
            <input type='hidden' value=".$articulo['nombre']." name='nombre'><br>
            <input type='hidden' value=".intval($articulo['pvp'])." name='pvp'><br>
            <input type='submit' value='Finalizar compra'><br><br>
            <input type='button' value='Volver atrás' onclick='redirectRamos1()'/>
          </form>";
        ?>

        <h3 id="mensajeExito" style="display:none">Pedidos realizado con éxito!!</h3><br>

        <footer class="jumbotron text-center" style="margin-bottom:0">
          * Atendemos por WhatsApp en el 678405363 todas sus dudas.
          <br></br>
          * Elige el dia de entrega de martes a sabado, No hay entregas domingo, lunes ni festivos.
          <br></br>
          * Haz tu pedido antes de las 16h y recíbelo al dia siguiente o el dia que tu elijas. Envío PRIORITARIO incluido en el precio. Entregas entre las 8 - 20h y en caso de ausencia se garantiza una segunda entrega.Los sábados entregas de 9 a 14h sin posibilidad de segunda entrega.
          <br></br>
          *Las flores se envían en una caja especial que las protege de cualquier daño y las mantiene ventiladas e hidratadas hasta que lleguen a su destino.
          Personaliza tu ramo con una dedicatoria, deja un mensaje con las flores, es gratuito.* Incluye sobre de conservante para prolongar la vida de las flores.
          <br><span align="center" class="ir-arriba icon-arrow-up2"></span>
        </footer>
      </aside><br>
    </section>
  </center>
</body>
</html>
