<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Formulario de contacto en AJAX</title>
    <link rel="stylesheet" type="text/css" href="css/registro.css" />
    <script type="text/javascript" src="js/validaciones.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
	  <script type="text/javascript">
	
	$(document).ready(function() {

		$("#validate").blur(function(){
		
			var emailAddress = $("#validate").val();
		  alert($("#validate").val());
			if(emailAddress != 0)
			{
				if(isValidEmailAddress(emailAddress))
				{
					$("#validate").css({
						"background-image": "url('imagen/validyes.png') no-repeat center right"
					});
				} else {
					$("#validate").css({
						"background": "url('imagen/validno.png') no-repeat center right"
					});
				}
			} else {
				$("#validate").css({
						"background": "none"
				});			
			}
		
		});
	
	});
	
	function isValidEmailAddress(emailAddress) {
 		var pattern = new RegExp(/^[0-9a-z_\-\.]+@[0-9a-z\-\.]+\.[a-z]{2,4}$/i);
 		return pattern.test(emailAddress);
	}
	
	</script>

	<style>
		#validEmail {
			margin-top: 4px;
			margin-left: 9px;
			position: absolute;
			width: 16px;
			height: 16px;
		}
	</style>

  </head>
  <body>
    <div id="formContenedor">
	    <form id="formulario" method="post" action="">
		    <div id="transparencia">
		  	  <div id="transparenciaMensaje">Caja transparente</div>
	    	</div>
        <fieldset>
   			  <legend>Datos de registro</legend>
  	  		<label id="lusuario" for="inputUser">Nombre:</label>
		  		<input class="inputNormal" type="text" id="inputUser" />
			  	<img src="imagen/ayuda.gif" alt="Ayuda" onmouseover="muestraAyuda(event, 'Nombre Usuario')" /><br />
  	  		<label id="lcorreo" for="inputCorreo">Correo electrónico:</label>
				  <input class="inputNormal" type="text" id="validate" />
			  	<img src="imagen/ayuda.gif" alt="Ayuda" onmouseover="muestraAyuda(event, 'Correo')" /><br />
  	  		<label id="lpass" for="inputPass">Contraseña:</label>
			  	<input class="inputNormal" type="password" id="inputPass" />
			  	<img src="imagen/ayuda.gif" alt="Ayuda" onmouseover="muestraAyuda(event, 'Contraseña')" /><br />
  	  		<label id="lrpass" for="inputRpass">Repetir contraseña:</label>
			  	<input class="inputNormal" type="password" id="inputRpass" />
			  	<img src="imagen/ayuda.gif" alt="Ayuda" onmouseover="muestraAyuda(event, 'Repetir Contraseña')" /><br />
			  </fieldset>		
		  <div id="abc">
			    <input id="botonEnviar" class="confirm" type="button" value="Enviar" onclick="validaForm()" /><input type="reset" class="confirm" value="Borrar" />
		  </div>
	    </form>
	    <div><span id="validEmail"></span></div>
    </div>

<!-- Capa para mostrar los mensajes de ayuda al presionar los iconos correspondientes -->
    <div id="mensajesAyuda">
  	  <div id="ayudaTitulo"></div>
  	  <div id="ayudaTexto"></div>
    </div>
  </body>
</html>
