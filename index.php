<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Formulario de contacto en AJAX</title>
<link rel="stylesheet" type="text/css" href="estilos.css">
<script src="jquery.js" type="text/javascript"></script>
<script src="jquery.validate.js" type="text/javascript"></script>

<script type="text/javascript" src="funciones.js"></script>

<script id="demo" type="text/javascript">
$(document).ready(function() {
	// validate signup form on keyup and submit
	var validator = $("#formulario").validate({
		rules: {
			inputUser: "required",
			lastname: "required",
			username: {
				required: true,
				minlength: 2,
				remote: "users.php"
			},
			password: {
				required: true,
				minlength: 5
			},
			password_confirm: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			email: {
				required: true,
				email: true,
				remote: "emails.php"
			},
			dateformat: "required",
			terms: "required"
		},
		messages: {
			inputUser: "Enter your firstname",
			lastname: "Enter your lastname",
			username: {
				required: "Enter a username",
				minlength: jQuery.format("Enter at least {0} characters"),
				remote: jQuery.format("{0} is already in use")
			},
			password: {
				required: "Provide a password",
				rangelength: jQuery.format("Enter at least {0} characters")
			},
			password_confirm: {
				required: "Repeat your password",
				minlength: jQuery.format("Enter at least {0} characters"),
				equalTo: "Enter the same password as above"
			},
			email: {
				required: "Please enter a valid email address",
				minlength: "Please enter a valid email address",
				remote: jQuery.format("{0} is already in use")
			},
			dateformat: "Choose your preferred dateformat",
			terms: " "
		},
		// the errorPlacement has to take the table layout into account
		errorPlacement: function(error, element) {
			if ( element.is(":radio") )
				error.appendTo( element.parent().next().next() );
			else if ( element.is(":checkbox") )
				error.appendTo ( element.next() );
			else
				error.appendTo( element.parent().next() );
		},
		// specifying a submitHandler prevents the default submit, good for the demo
		submitHandler: function() {
			alert("submitted!");
		},
		// set this class to error-labels to indicate valid fields
		success: function(label) {
			// set &nbsp; as text for IE
			label.html("&nbsp;").addClass("checked");
		}
	});
	
	// propose username by combining first- and lastname
	$("#inputUser").focus(function() {
		var inputUser = $("#inputUser").val();
		var lastname = $("#lastname").val();
		if(inputUser && lastname && !this.value) {
			this.value = inputUser + "." + lastname;
		}
	});

});
</script>


</head>

<body>
<div id="formContenedor">
	<form id="formulario" autocomplete="off" method="post" action="">
		<div id="transparencia">
			<div id="transparenciaMensaje">Caja transparente</div>
		</div>
		<table>
			<tbody>
				<tr>
					<td class="label"><label id="lusuario" for="inputUser">Nombre:</label></td>
					<td class="campo"><input class="inputNormal" type="text" id="inputUser"></td>
					<td class="ayuda"><img src="ayuda.gif" alt="Ayuda" onmouseover="muestraAyuda(event, 'Nombre Usuario')"></td>
				</tr>
				<tr>
					<td class="label">Correo electrónico:</td>
					<td class="campo"><input class="inputNormal" type="text" id="inputCorreo"></td>
					<td class="ayuda"><img src="ayuda.gif" alt="Ayuda" onmouseover="muestraAyuda(event, 'Correo')"></td>
				</tr>
				<tr>
					<td class="label">Contraseña:</td>
					<td class="campo"><input class="inputNormal" type="text" id="inputPass"></td>
					<td class="ayuda"><img src="ayuda.gif" alt="Ayuda" onmouseover="muestraAyuda(event, 'Contraseña')"></td>
				</tr>
				<tr>
					<td class="label">Repetir contraseña:</td>
					<td class="campo"><input class="inputNormal" type="text" id="inputRpass"></td>
					<td class="ayuda"><img src="ayuda.gif" alt="Ayuda" onmouseover="muestraAyuda(event, 'Repetir Contraseña')"></td>
				</tr>
			</tbody>
		</table>
		<br>
		<div>
			<button id="botonEnviar" onClick="validaForm()" type="button">Enviar</button>
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
