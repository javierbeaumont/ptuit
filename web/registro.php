<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Formulario de contacto en AJAX</title>
    <link rel="stylesheet" type="text/css" href="css/registro.css" />
    <script type="text/javascript" src="js/validaciones.js"></script>
  </head>
  <body>
    <div id="formContenedor">
	    <form id="formulario" method="post" action="">
		    <div id="transparencia">
		  	  <div id="transparenciaMensaje">Caja transparente</div>
	    	</div>
		  <table>
			  <tbody>
		  		<tr>
			  		<td class="label"><label id="lusuario" for="inputUser">Nombre:</label></td>
		  			<td class="campo"><input class="inputNormal" type="text" id="inputUser" /></td>
			  		<td class="ayuda"><img src="imagen/ayuda.gif" alt="Ayuda" onmouseover="muestraAyuda(event, 'Nombre Usuario')" /></td>
		  		</tr>
			   	<tr>
				  	<td class="label">Correo electrónico:</td>
				  	<td class="campo"><input class="inputNormal" type="text" id="inputCorreo" /></td>
			  		<td class="ayuda"><img src="imagen/ayuda.gif" alt="Ayuda" onmouseover="muestraAyuda(event, 'Correo')" /></td>
			  	</tr>
			  	<tr>
				  	<td class="label">Contraseña:</td>
			  		<td class="campo"><input class="inputNormal" type="password" id="inputPass" /></td>
			  		<td class="ayuda"><img src="imagen/ayuda.gif" alt="Ayuda" onmouseover="muestraAyuda(event, 'Contraseña')" /></td>
			  	</tr>
			  	<tr>
			  		<td class="label">Repetir contraseña:</td>
			  		<td class="campo"><input class="inputNormal" type="password" id="inputRpass" /></td>
			  		<td class="ayuda"><img src="imagen/ayuda.gif" alt="Ayuda" onmouseover="muestraAyuda(event, 'Repetir Contraseña')" /></td>
			  	</tr>
		  	</tbody>
	  	</table>
		  <div>
			  <button id="botonEnviar" onclick="validaForm()" type="button">Enviar</button>
			  <button type="reset">Borrar</button>
		  </div>
	    </form>
    </div>

<!-- Capa para mostrar los mensajes de ayuda al presionar los iconos correspondientes -->
    <div id="mensajesAyuda">
  	  <div id="ayudaTitulo"></div>
  	  <div id="ayudaTexto"></div>
    </div>
  </body>
</html>

