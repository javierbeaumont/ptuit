<?php echo '<?xml version=\"1.0\" encoding=\"UTF-8\" ?>'."\n"; 
/*Author: JoseManuelDominguez
  Date:   08.02.2011 */?>
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
    //Queda por cargar aquí el controlador para comprobar que el nick/pass exista en la BBDD
    include '../php/UserLoginCtrl.php'; //Carga el controlador de carga de página de usuario
    if(isset($error)) {
      if($error) {
        echo '<div id="error">';
          echo '<p>No existe nadie registrado con ese usuario/password. Por favor, revisa los datos.</p>';
        echo '</div>';
      }
      else {
        //Si no hay errores, se carga la página de usuario con el formato 'user'+nick.php
        $userPage = new UserLoginCtrl($_POST['nick']);
         header('Location: '.$userPage->getUserPage());

      }
    }
  ?>
<?php
// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
date_default_timezone_set('UTC');

// Imprime algo como: Monday 8th of August 2005 03:12:46 PM
echo 'Copyright Ptuit '.date('Y');
?>
</body>
</html>
