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
      session_start();
      if(!isset($_POST['nombre'])){
          die("No puedes acceder");
      }
   ?>
  <div class="jumbotron text-center" style="background-image: url('IMAGENES_RAMOS/floresfondo.jpg'); background-size: 40% 110%; margin-bottom:auto;">
    <h1>Party Flowers S.A.</h1>
    <p>Tu floristeria online, y cada vez la de más gente</p>
  </div>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="nav-link">PAGO</a>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class='nav-item'>
          <a class='nav-link' href='./ramos1.php'>Cancelar</a>
        </li>
      </ul>
    </div>
  </nav>

  <br>
  <h3 align="center">Proceso de pago, pulse en el siguiente botón para continuar en PayPal</h3>
  <br>

  <form align="center" action="https://www.sandbox.paypal.com/es/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="business" value="sb-mlytk4058164@business.example.com">
    <input type="hidden" name="item_name_1" value="<?php $_POST['nombre']?>">
		<input type="hidden" name="amount_1" value="<?php intval($_POST["pvp"])*intval($_POST["cantidad"])?>">
    <input type="hidden" name="quantity_1" value="<?php $_POST["cantidad"]?>">
    <input type="hidden" name="item_name_2" value="Gastos de envío">
		<input type="hidden" name="amount_2" value="10">
    <input type="hidden" name="currency_code" value="EU">
    <input type="hidden" name="return" value="http://localhost/Pruebas/Tema3/Paypal/pagoconexito.php">
		<input type="hidden" name="cancel_return" value="http://http://www.partyflowers.com/mvc/Sistema/Vista/index.php">
    <input type='hidden' name='first_name' value='PartyFlowers'>
		<input type="hidden" name="address1" value="Calle ancha">
		<input type="hidden" name="city" value="Albacete">
		<input type="hidden" name="zip" value="02003">
		<input type="hidden" name="lc" value="es">
		<input type="hidden" name="country" value="ES">
		<input type="image" src="https://www.paypal.com//es_ES/i/btn/x-click-but5.gif" name="submit" alt="Pagos con PayPal: Rápido, gratis y seguro">
  </form>

</body>
</html>
