<?php
//Incuir el archivo conexion a la Base de Datos
     require_once 'bd.php'; //incluir conexion
     include_once 'sesiones.php';
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
 
	$db = new bd.conexion();//Nos conectamos
	$result = $db->prepare("SELECT * FROM usuarios WHERE nombre = '".$username."'");
	$result->execute();

	if (!empty($result) // si la consulta devuelve datos
	{
	  $row = $result->fetch())  //Meto el resultado en un array 
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