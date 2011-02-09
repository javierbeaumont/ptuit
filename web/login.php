<?php echo '<?xml version=\"1.0\" encoding=\"UTF-8\" ?>'."\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtmll/DTD/xhtmll.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
  <title>ptuit - Login</title>
</head>
<body>
  <form action="login.php" method="post" enctype="multipart/form-data">
    <fieldset>
      <label for="nick">Nick:</label><input type="text" id="nick" name="nick"/><br />
      <label for="pass">Password:</label><input type="password" id="pass" name="pass"/><br />
      <input type="submit" value="Entrar"/>
    </fieldset>
  </form>
  <?php
    if(isset($error)) {
      if($error) {
        echo '<div id="error">';
          echo '<p>No existe nadie registrado con ese usuario/password. Por favor, revisa los datos.</p>';
        echo '</div>';
      }
      else {
        header('Location: http://www.example.com/');
      }
    }
  ?>
<?php
// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
date_default_timezone_set('UTC');

// Imprime algo como: Monday 8th of August 2005 03:12:46 PM
echo '© Ptuit '.date('Y');

?>
</body>
</html>
