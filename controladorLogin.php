<?php
//Incuir el archivo conexion a la Base de Datos
 include("conexion.php"); //incluir conexion
/**
@class controladorLogin  para controlar el logeo de usuarios*/
 class controladorLogin
   {
    /** @param $error que devuelve true o false segun la validación*/
    /** @param $username que recoge el nick*/
    /** @param $password que recoge el password*/
    public $error=false;
    public $username = $_POST['nick']; 
    public $password = $_POST['pass']; 

   /** @fn ( validarLogin que busca en la base de datos por el nick del usuario y devuelve el id del mismo si todo a ido bien o la varia error=false)*/
    public function validarLogin()
    {

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
		this.$error = true; 
	    } 
	else //si el nombre no se encuentra en BBDD
	{
	    
	      this.$error=true;  
	}
      }
      return this.$error; 
    }
}
?>
