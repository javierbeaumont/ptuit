<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<title>Ptuit</title>
<link rel="stylesheet" href="./css/styles.css" type="text/css"/>
</head>

<body>

<div id="header">
<img src="./image/logo.jpg" alt="Logo" />
<a href="http://localhost/registro.php">Registrarse</a>
<a href="http://localhost/login.php">Login</a>
</div>

<div id="content">


<script type="text/javascript">



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
	  /*añadir mensajes mediante efecto*/
	
	}
      }
    }
  }
}
 


window.onload = anadirmensaje;

</script>







</div>

<div id="footer">
<p>© Ptuit 2011 </p>

</div>
</body>
</html>