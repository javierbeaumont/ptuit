<?php

  class existNombreUsuario
  
    { 
  
      function find_user($nombre) 
	{ 
      
	# Conexión a la bbdd
	mysql_select_db ("ptuit");

	# Asignación a variable de "consulta a tabla usuario para comprobar existencia del usuario
	$query="SELECT nombre FROM usuario WHERE nombre=".$nombre;
      
	#Asignación del valor de la consulta a la variable "$result"
	$result = mysql_query($query, ptuit) or die ("Problema conexión a bbdd");


	    # Si el resultado de la consulta es NULL, entonces el usuario no existe en la bbdd.
	    if ($result==NULL)
	      {
		echo 'No existe ese Usuario';
	      }
	    else
		# Si existe el usuario, llamamos a funcion que compruebe el pass
		find_pass;
	}	
    }

?>
