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
  <div class="jumbotron text-center" style="background-image: url('IMAGENES_RAMOS/floresfondo.jpg'); background-size: 40% 110%; margin-bottom:auto;">
    <h1>Party Flowers S.A.</h1>
    <p>Tu floristeria online, y cada vez la de más gente</p>
  </div>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="nav-link">PAGO</a>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class='nav-item'>
          <a class='nav-link' href='./index.php'>Cancelar</a>
        </li>
      </ul>
    </div>
  </nav>

  <br>
  <h3 align="center">Proceso de pago, pulse en el siguiente botón para continuar en PayPal</h3>
  <br>

  <form align="center" action="https://www.sandbox.paypal.com/es/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="sb-mlytk4058164@business.example.com">
    <input type="hidden" name="item_name" value="Centro de rosas">
    <input type="hidden" name="currency_code" value="EU">
    <input type="hidden" name="amount" value="15,00">
    <input type="hidden" name="item_name" value="Centro de margaritas">
    <input type="hidden" name="currency_code" value="EU">
    <input type="hidden" name="amount" value="25,00">
    <input type="image" src="http://www.sandbox.paypal.com/es_ES/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
  </form>

</body>
</html>
