<?php


class RecogerUsuario{

  $usuario = new recogerDatos();

//Recogemos la id y la contraseña introducida por el usuario (idweb y nomweb) 
//Se la enviamos a la función recogerDatos, que lee la base de datos y la compara.
//Las comparamos con la que recibimos de la base de datos (idbd)

    public function RecogerDatosUsuario($idweb, $passweb)
      {
	$arr = ($idweb, $passweb);
	$resul = $usuario->recogerDatos($arr);
	if ($resul[0] == $idweb && $resul[1] == $passweb)
	  return true;
	else
	  return false;
      }

/** ME TIENE QUE DECIR GEMMA QUE ES LO QUE DEVUELVE SU FUNCION recogerDatos. SI NO DEVUELVE EL ARRAY CON LOS DATOS DE ID Y CONTRASEÑA HAY QUE CAMBIARLO.*/
}
?>