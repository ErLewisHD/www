//Script para PartyFlowers
//-------------------------FUNCIONES INDEX.PHP-------------------------

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

function logout(){
  location.replace('../Vista/logout.php');
}

function funcionBloqueada(){
  document.getElementById("mensajeBloqueo").style.display = "block";
}

var cont = 0;
var x;
loadDoc(cont);

function loadDoc(cont) {
    var xhttp;
    if (window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } else {
        // crear objeto para navegadores IE5 e IE6
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            muestraDatos(this, cont);
        }
    };
    xhttp.open("GET", "catalogo.xml", true);
    xhttp.send();
}

function muestraDatos(xml, cont) {
    var xmlDoc = xml.responseXML;
    x = xmlDoc.getElementsByTagName("articulo");
    document.getElementById("info").innerHTML =
        '<h2>' + x[cont].getElementsByTagName("nombre")[0].childNodes[0].nodeValue + '</h2><br>' +
        '<img src="../../img/' + x[cont].getElementsByTagName("foto")[0].childNodes[0].nodeValue + '" width="200" height="200"><br>' +
        '<h4>' + x[cont].getElementsByTagName("precio")[0].childNodes[0].nodeValue + ' €</h4>';
}

//Generador num aleatorio
function azar() {
    cont = Math.floor((Math.random() * x.length) + 0);
    loadDoc(cont);
}

//-------------------------FUNCIONES RAMOS1.PHP-------------------------

function esconderPublicidad(){
    document.getElementById("imagenPublicidad").style.display = "none";
    document.getElementById("botonPublicidad").style.display = "none";
    alert("La publicidad ahora está oculta");
}

function bigImg(x) {
  x.style.height = "400px";
  x.style.width = "400px";
}

function normalImg(x) {
  x.style.height = "250px";
  x.style.width = "250px";
}

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    filtrado(this, null, null);
  }
};
xmlhttp.open("GET", "catalogo.xml" , true);
xmlhttp.send();

function filtrar(tipo, color){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      filtrado(this, tipo, color);
    }
  };
  xmlhttp.open("GET", "catalogo.xml" , true);
  xmlhttp.send();
}

function filtrado(xml, tipo, color) {
  var x, i, xmlDoc, table, tip, colo;
  xmlDoc = xml.responseXML;
  table= '';
  x = xmlDoc.getElementsByTagName("articulo");
  for (i = 0; i < x.length; i++) {
      tip= x[i].getElementsByTagName("tipo")[0].childNodes[0].nodeValue;
      colo= x[i].getElementsByTagName("color")[0].childNodes[0].nodeValue;
      if((tipo== null && color == null) || (tip== tipo && (colo==color || color=='Todos'))){
        table += '<tr><td><br><h5>' +
          x[i].getElementsByTagName("nombre")[0].childNodes[0].nodeValue + '</h5>Color: ' +
          x[i].getElementsByTagName("color")[0].childNodes[0].nodeValue + '<br>Cantidad disponible: ' +
          x[i].getElementsByTagName("cantidad")[0].childNodes[0].nodeValue + '<br>Precio: ' +
          x[i].getElementsByTagName("precio")[0].childNodes[0].nodeValue + '€' +
          ' Iva aplicado: ' + x[i].getElementsByTagName("iva")[0].childNodes[0].nodeValue + '%' +
          '<br><br><form action="Comprar.php" method="GET"> <input type="hidden" name="coda" value="'+x[i].getElementsByTagName("coda")[0].childNodes[0].nodeValue+'"><input type="submit" value="Comprar"></form>' +
          '</td><td><img src="../../img/' + x[i].getElementsByTagName("foto")[0].childNodes[0].nodeValue + '" alt="Foto" onclick="bigImg(this)" onmouseout="normalImg(this)" width="200" height="200"> </td></tr>';
      }
  }
  document.getElementById("catalogo").innerHTML = table;
}

function logout(){
  location.replace('./logout.php');
}

$(function(){
    var maxHeight = 400;
    $(".dropdown > li").hover(function() {

         var $container = $(this),
             $list = $container.find("ul"),
             $anchor = $container.find("a"),
             height = $list.height() * 1.1,
             multiplier = height / maxHeight;

        $container.data("origHeight", $container.height());
        $anchor.addClass("hover");
        $list
            .show()
            .css({
                paddingTop: $container.data("origHeight")
            });
        if (multiplier > 1) {
            $container
                .css({
                    height: maxHeight,
                    overflow: "hidden"
                })
                .mousemove(function(e) {
                    var offset = $container.offset();
                    var relativeY = ((e.pageY - offset.top) * multiplier) - ($container.data("origHeight") * multiplier);
                    if (relativeY > $container.data("origHeight")) {
                        $list.css("top", -relativeY + $container.data("origHeight"));
                    };
                });
        }

    }, function() {
        var $el = $(this);
        $el
            .height($(this).data("origHeight"))
            .find("ul")
            .css({ top: 0 })
            .hide()
            .end()
            .find("a")
            .removeClass("hover");

    });

});
//-------------------------FUNCIONES LOGIN.PHP-------------------------

function redirectIndex(){
  location.replace('./index.php');
}

//-------------------------FUNCIONES REGISTRO.PHP-------------------------

var p1 = document.getElementById("password");
var p2 = document.getElementById("password2");

p2.onblur = function(){
  if(!p1.value.match(p2.value)) {
    alert("Las contraseñas no coinciden");
    return false;
  } else {
    return true;
  }
}

if(document.getElementById("error")){
  document.getElementById("mensajeError").style.display = "block";
}

//-------------------------FUNCIONES COMPRAR.PHP-------------------------

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
$(document).ready(function(){
  $("#").mouseleave(function(){
    alert("Pedido realizado con éxito!");
  });

  if(document.getElementById("exito")){
    document.getElementById("formulario").style.display = "none"
    document.getElementById("mensajeExito").style.display = "block";
  }
});

function redirectRamos1(){
  location.replace('./ramos1.php');
}
