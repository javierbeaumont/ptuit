<?php
/// Test for the 'validar' class
include ("validar.php");

$validar = new validar();

// test the data received
$nick = $_POST["inputUser"];
$correo = $_POST["inputCorreo"];
$pass = $_POST["inputPass"];
$rpass = $_POST["inputRpass"];

// check if the e-mail is valid
if ($validar->validar_email($correo)) 
{
   echo  'Appears to be a valid e-mail';
} 
else 
{
   echo  'Appears to be a wrong e-mail';
}

// check the length of the password
if ($validar->validar_clave($pass, $error)) 
{
   echo  'The password is long enough';
} 
else 
{
   echo  $error;
}

// check the two fields sent as password ensuring that both have the same content
if ($validar->comparar_clave($pass, $rpass)) 
{
   echo  'Both passwords are the same';
} 
else 
{
   echo  'The passwords are different';
}


// falta la que comprueba si el nick esta en la BD
if ($validar->esta_nick($nick)) 
{
   echo  'Correct username';
} 
else 
{
   echo  'Incorrect username';
}


?>