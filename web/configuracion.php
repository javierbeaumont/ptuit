<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-style-type" content="text/css">
    <title>Editar perfil</title>
		<script type="text/javascript" src="js/jquery.js"></script>
	</head>
  <body>
		<h1>Tus datos actuales son:</h1>
		<ul>
			<li>Nombre:</li>
			<li>Correo electrónico:</li>
			<li>Contraseña:</li>
			<li>Nº de mensajes escritos:</li>
		</ul>
		<h2>Introduce tus nuevos datos</h2>
		<?php  
				echo "<form>";
					require('registro.php');
				echo "</form>";
		?>
		
		
		<script>
			$("h2").click(function () {
			$("form").toggle("500");
			});    
		</script>

  </body>
</html>