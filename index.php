<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<title>Ptuit</title>
<link rel="stylesheet" href="./css/styles.css" type="text/css"/>

<script type="text/JavaScript">
function timedRefresh(timeoutPeriod) {
	setTimeout("location.reload(true);",timeoutPeriod);
}
</script>

</head>

<body onload="JavaScript:timedRefresh(5000);">


      <div id="header">
      <img src="./image/logo.jpg" alt="Logo" />
      <a href="http://localhost/registro.php">Registrarse</a>
      <a href="http://localhost/login.php">Login</a>
      </div>

      <div id="content">

      <div id="marco"></div>






      <div id="caja_men">


	  <script type="text/javascript">
	  
	    var mun_mensajes=0;

	    function anadirmensaje() {
	
		/*Obtener la instancia del objeto XMLHttpRequest para los diferentes navegadores*/
		  if(window.XMLHttpRequest) {
		    peticion_http = new XMLHttpRequest();
		  }
		  else if(window.ActiveXObject) {
		    peticion_http = new ActiveXObject("Microsoft.XMLHTTP");
		  }

		  /*peticion del id del ultimo mensaje*/
		  peticion_http.onreadystatechange = idmensaje;
		  peticion_http.open('POST', /*ruta publica*/, true);
		  peticion_http.send(null);
		  var id; 

		  function idmensaje() {
		    if(peticion_http.readyState == 4) {
		      if(peticion_http.status == 200) {
			id= /** @TODO id de ultimo mensaje*/;
		      }
		    }
		  }

		
		/*envio de id del ultimo mensaje */
		peticion_http.onreadystatechange = mensajesnuevo;
		  peticion_http.open('POST', /** @TODO ruta publica*/, true);
		  peticion_http.send(id);

		  function mensajesnuevos() {
		      if(peticion_http.readyState == 4) {
			if(peticion_http.status == 200) {

		      /* comprobar que hay mensajes nuevos*/
			/*si hay mensajes obtener datos(id,usuario,fecha y texto) de cada uno de los mensajes */
			  for(var i=1; i</*numero de mensajes*/; i++){
			    /*añadir mensajes mediante*/

			var cm = document.getElementById("caja_men");
			var div = document.createElement("div");
			var p = document.createElement("p");
			var texto = document.createTextNode(/*mensaje*/);
			
			p.appendChild(texto);
			div.appendChild(p);
			div.attributes.setNamedItem("class").nodeValue = "mensaje";
			div.attributes.setNamedItem("id").nodeValue = /*fecha del mensaje*/;
			cm.appenchild(div);
			
		    /*efecto para añadir mensaje*/
		
			$("# /*fecha del mensaje*/ ").fadeIn(3000);
		    
			/*control de numero de mensajes*/
			var men = document.getElementsByTagName(".mensaje");
			/*20 mensajes como maximo*/
			if(men.length==20){
			    var men_elim = document.getElementsByTagName(".mensaje")[19];
			    document.body.removeChild(men_elim);
			}

	      }
	    }
	  }
	}
      }


      window.onload = anadirmensaje;

      </script>



     </div>





      </div>

      <div id="footer">
      <p>© Ptuit 2011 </p>

      </div>
</body>
</html>