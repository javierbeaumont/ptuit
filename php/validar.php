<?php
# ptuit
#
# Copyright © 2011 Sara y Mikel <ptuit@ptuit.org>
#
# This file is part of ptuit.
#
# ptuit is free software: you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as
# published by the Free Software Foundation, either version 3 of the
# License, or (at your option) any later version.
#
# ptuit is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU Affero General Public License for more details.
#
# You should have received a copy of the GNU Affero General Public License
# along with ptuit. If not, see <http://www.gnu.org/licenses/>.

class validar{

/**
*	Check the email received. The string must contain the '@' and the '.'
*	and must contain from 1 to 64 characters (lleters numbre and '-' '_') as username and from 1 to 254 characters 
*	as server.
*
*	Sorry for my english
*/
function validar_email($email) 
	 {
	    $regex = "/(^[A-Za-z0-9]+[A-Za-z0-9-_]{0,63}\@{1}[A-Za-z0-9-_]{1,254}\.{1}[A-Za-z]{2,6})$/";
	    // check the string and ensure that it contents the '@' and '.' symbols or go away
	    (strpos($email, '@') && strpos($email, '.')) || return false;
	    // test the string with the regular expresion
	    return preg_match($regex, $email);
	 }



/**
*	Check the length of the password submitted
*
*/
function validar_clave($clave,&$error_clave){
   if(strlen($clave) < 8){
      $error_clave = "The password must be at least 8 characters long";
      return false;
   }
   if(strlen($clave) > 64){
      $error_clave = "The password can't be more than 64 characters long";
      return false;
   }
   $error_clave = "";
   return true;
} 

function comparar_clave($clave,$repClave){
   if($clave != $repClave) return false;

   return true;
} 

///Falta la creacion de una funcion que compruebe en la BD si el nick esta o no
function esta_nick($nick)
{
///llamar al metodo que se ocupa de comprobar si esta el nick.
return true;
}

}


/*
// codigo original de sara.
?>


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

*/


?>