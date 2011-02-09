<?php

class validar{
function validar_email($email) {
	    $regex = "/^([a-z0-9+_]|\-|\.)+@(([a-z0-9_]|\-)+\.)+[a-z]{2,6}$/i";
	    //comprobamos si la cadena tiene el simbolo de @ y el punto
	    if (strpos($email, '@') !== false && strpos($email, '.') !== false) {
	    //comparamos con la expresion regular la cadena
	        if (preg_match($regex, $email)) {
	            return true;
	        } else {
	            return false;
	        }
	    } else {
	        return false;
	    }
	}




function validar_clave($clave,&$error_clave){
   if(strlen($clave) < 8){
      $error_clave = "La clave debe tener al menos 8 caracteres";
      return false;
   }
   if(strlen($clave) > 64){
      $error_clave = "La clave no puede tener más de 64 caracteres";
      return false;
   }
   $error_clave = "";
   return true;
} 

function comparar_clave($clave,$repClave){
   if($clave != $repClave){
      
      return false;
   }
   
   return true;
} 

///Falta la creacion de una funcion que compruebe en la BD si el nick esta o no
function esta_nick($nick)
{
///llamar al metodo que se ocupa de comprobar si esta el nick.
return true;
}

}




?>