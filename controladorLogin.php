<?php
/**Incuir el archivo conexion a la Base de Datos*/
 include("conexion.php"); //incluir conexion

 /**Classe para controlar el logeo de usuarios*/
 class controladorLogin
   {
 
    public $error=false;

    public function validarLogin()
    {
	$username = $_POST['nick']; //recogo el nick
	$password = $_POST['pass']; //recogo el password

	$password = sha1($password); //Desencriptar;

	$result = mysql_query("SELECT * FROM usuarios WHERE nombre = '".$username."'");

	if (!empty($result) // si la consulta devuelve datos
	{
	  $row = mysql_fetch_array( $result ))  //Meto el resultado en un array 
	  if ( $row['password'] == $password )//Valido password
	    { 
		Sesiones.crearSesion($row['id'])  ; 
	    } 
	    else
	      {
		$error = true; 
	    } 
	else //si el nombre no se encuentra en BBDD
	{
	    
	      return $error=true;  
	}
      }
      return $error; 
    }
}
?>
