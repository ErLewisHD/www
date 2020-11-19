<!DOCTYPE html>
<html lang="es">
<head>
  <title>Party Flowers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="botones.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  .carousel-caption {
    font-size: 20px;
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


<?php
	session_start();
	if (isset($_SESSION['usuario'])) {
		$cosa = "<h1>" . $_SESSION['usuario'] . "</h1>";
	} else {
		$cosa = "<h1>Road of nopes</h1>";
	}
	echo $cosa;
?>

<?php
	//Dia y hora actual con cookies
	setcookie("fechaActual",date("d M y"));
	echo "Fecha actual: ".$_COOKIE["fechaActual"];
	//Dia y hora ultimo acceso con cookies
	if(isset($_COOKIE["fechaUltAcceso"])){
		echo "<br>Fecha ultimo acceso: ".$_COOKIE["fechaUltAcceso"];
		setcookie("fechaUltAcceso",date("d M y  H:i:s"));
	}
	else{
		echo "Eres el primer acceso";
		setcookie("fechaUltAcceso",date("d ").date(" M").date(" y").date(" H:").date("i:").date("s"));
	}
	//Contador accesos a la página
	if(isset($_COOKIE["contador"])){
		//La cookie caduca cada 10 minutos
		setcookie("contador", $_COOKIE["contador"] + 1, time() + 60 * 10);
	}
	else{
		setcookie('contador', 1, time() + 60 * 10);
	}
	echo "<br>Accesos a la página: ".$_COOKIE["contador"];
  require 'conexionPDO.php';
?>

<body>
<div class="jumbotron text-center" style="background-image: url('PESTAÑA_RAMOS/IMAGENES_RAMOS/floresfondo.jpg'); background-size: 40% 110%; margin-bottom:auto;">
  <h1>Party Flowers S.A.</h1>
  <p>Tu floristeria online, y cada vez la de más gente</p>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php">Inicio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="PESTAÑA_RAMOS/ramos1.html">Ramos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Centros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="SanValentin/sanvalentin.html">San Valentín</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.html">Iniciar sesion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="registro.html">Registrarse</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4">
      <h2>Acerca de nosotros</h2>
      <h5>Nuestra tienda:</h5>
      <img id="image-main" class="fakeimg" src ="https://www.emagister.com/express/media/catalog/product/cache/1/image/788x525/9df78eab33525d08d6e5fb8d27136e95/2/9/2949472_big_3/www.emagister.com-albe-formacion-premium-s.l.-2949472-curso-a-distancia-de-auxiliar-de-floristeria-31.jpg" > </img>
      <p>Llamanos al: 967809743 </p>

      <h2>¿Donde estamos?</h2>
      <h5>Nos podrás encontrar aqui:</h5>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3101.3895789236526!2d-1.8560039852783101!3d38.98360424946431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd665fdcdb5c7bb7%3A0x646e98990feba22f!2sAv.%20de%20Espa%C3%B1a%2C%20Albacete!5e0!3m2!1ses!2ses!4v1603792953061!5m2!1ses!2ses" width="300" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      <p>Flowers party, tu floristería de confianza</p>
      <p>Encuentranos en la Avenida España, 47, 02002 Albacete</p>

      <hr class="d-sm-none">
    </div>
    <div class="col-sm-8">

      <h2>¡ Ofertas diarias !</h2>
      <h5>Ven ahora y descubre nuestras ofertas del día:</h5>

      <body data-spy="scroll" data-target="#myScrollspy" data-offset="1">

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-9 col-8">
            <div id="demo" class="carousel slide" data-ride="carousel">
              <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
              </ul>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="https://cdn03.lolaflora.com/bonnygift/lola137-2/L/lola137-2-8d806ed54a35921-715ee9e2.jpg" alt="Imagen oferta 1" width="1100" height="500">
                  <div class="carousel-caption text-body">
                    <h4>Ramo de Lírio de rosas + jarrón</h4>
                    <p>En esta primera oferta del día, encontramos un ramo de Lírios + jarrón, donde todo esto saldría por la cantidad de 30$.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="https://media.v2.siweb.es/siweb_uno_thumb_medium/content/781274/cesta_de_plantas_y_orquidea_rosa_1.jpg" alt="Imagen oferta 2" width="1100" height="500">
                  <div class="carousel-caption text-white">
                    <h4>Cesta de plantas mediana</h4>
                    <p>En esta segunda oferta del día, encontramos una cesta de plantas mediana, donde todo esto saldría por la cantidad de 50$.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="https://previews.123rf.com/images/juliza09/juliza091801/juliza09180100131/93536060-muchas-hermosas-rosas-sin-fondo-flores-rosas-aisladas-en-grandes-n%C3%BAmeros-conjuntos-de-flores.jpg" alt="Imagen oferta 3" width="1100" height="500">
                  <div class="carousel-caption" style="color: black; -webkit-text-stroke: 0.2px white;">
                    <h4>Conjunto vario de flores</h4>
                    <p>En esta tercera oferta del día, encontramos un conjunto de flores ideal para algun evento especial, donde todo esto saldría por la cantidad de 200$.</p>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon bg-dark"></span>
              </a>
              <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon bg-dark"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </body>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){

	$('.ir-arriba').click(function(){
		$('body, html').animate({
			scrollTop: '0px'
		}, 300);
	});

	$(window).scroll(function(){
		if( $(this).scrollTop() > 0 ){
			$('.ir-arriba').slideDown(300);
		} else {
			$('.ir-arriba').slideUp(300);
		}
	});

});
</script>

<footer class="jumbotron text-center" style="margin-bottom:0">
  Pie de página <br>
  <span align="center" class="ir-arriba icon-arrow-up2"></span>
</footer>

</body>
</html>
