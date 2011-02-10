<?php
/** Esta clase permite hacer una inserción en la tabla seguir usarios indicando solo la id del usuario seguidor y la id del seguido
/*
    Author: JoseManuelDominguez
    Date: 10.02.2011           
*/  
  class SeguirUsuario {
/**
  *@class SeguirUsuario*/

    function __construct($idseguidor, $idseguido)  {

      $con = mysql_connect("localhost","root","Nobel");

      if (!$con)
        {
        die('Could not connect: ' . mysql_error());
        }

      mysql_select_db("ptuit", $con);

      mysql_query("INSERT INTO seguirusuarios (idseguidor, idseguido )
      VALUES ($idseguidor,$idseguido)");

      mysql_close($con);
    }
}
?>