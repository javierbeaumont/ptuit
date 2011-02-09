<?php
///incluir clase
include ("validar.php");
///crear clase
$validar = new validar();
///recojo las variables del formulario
$nick = $_POST["inputUser"];
$correo = $_POST["inputCorreo"];
$pass = $_POST["inputPass"];
$rpass = $_POST["inputRpass"];

///miro si el email es valido
if ($validar->validar_email($correo)) 
{
   echo  ' es una dirección válida de correo';
} 
else 
{
   echo  'no es una direccion valida';
}
///miro si las claves son iguales.
if ($validar->validar_clave($pass, $error)) 
{
   echo  'la clave esta bien';
} 
else 
{
   echo  $error;
}
///miro si las claves son iguales.
if ($validar->comparar_clave($pass, $rpass)) 
{
   echo  'la claves son iguales';
} 
else 
{
   echo  'Las claves no son iguales';
}
/// falta la que comprueba el nick si esta en la BD

if ($validar->esta_nick($nick)) 
{
   echo  'nick correcto';
} 
else 
{
   echo  'Las claves no son iguales';
}


?>