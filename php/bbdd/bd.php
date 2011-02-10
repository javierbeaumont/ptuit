<?php
include "../web/conf.php";

class bd{

  protected function conexionBd(){   //crea la conexion con la BD
    try {
        $db = new PDO('mysql:host='.DB_HOST, DB_USER, DB_PASSWORD);
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
        return($db);
    } catch (PDOException $e) {
        print($e);
        print "<p>Error: No puede conectarse con la BD.</p>\n";
        //  print "<p>Error: " . $e->getMessage() . "</p>\n";
        //pie();
        exit();
    }
    $db = conexionBd();
  }

  protected function desconexionBd() {   //desconecta la BD por seguridad
   $db = NULL; 
  }

  protected function recogerPrepararDatosSelect($tabla,$array){   //con prepare recojo datos en vble array y le quito comas/comillas... etc.

    for ($i=0; $i<count($array); $i++)       
    {       
      if ($array[1]==null and $tabla=="usuario") $i++; 
      $bd->bindParam($i,$array[$i]);
      $arrayPrepared[$i]=$array[$i].', ';      
      print ($arrayPrepared[$i]);
    }  
    $arrayPreparedSelect[$i]=rtrim($arrayPrepared[$i],", ");
    return $arrayPreparedSelect;    
}

 protected function recogerPrepararDatosWhere($tabla,$array){ 
 
    for ($i=0; $i<count($array); $i++)       
    { if ($array[1]==null and $tabla=="usuario") $i++;       
      $bd->bindParam($i,$array[$i]);
      $arrayPrepared[$i]= $arrayPrepared[$i]." ".$campos[$i]."=".$arrayPrepared[$i]." and ";       
      print ($arrayPrepared[$i]);
    }  
    $arrayPreparedWhere[$i]=rtrim($arrayPrepared[$i]," and ");
    return $arrayPreparedWhere; 
 }

 protected function recogerPrepararDatos_campoValor($tabla,$array){    

    //preparo los valores introducidos sin comas...
    for ($i=0; $i<count($array); $i++)       
    { if ($array[1]==null and $tabla=="usuario") $i++;       
      $bd->bindParam($i,$array[$i]);          
      print ($array[$i]);
    }     

    // añado los = y las comas para formar la estructura
    foreach ($array as $campo=>$valor)
    {    $arrayPrepared= $arrayPrepared." ".$campo."=".$valor.", ";   }
    $arrayPrepared=rtrim($arrayPrepared,", ");
    return $arrayPrepared; 
}

//********************************* funciones select, update, insert y delete ****************************
  
  protected function select($tabla,$arraySelect,$arrayWhere){   

    $db = conexionBd();
    $arrayPreparedSelect=recogerPrepararDatosSelect($tabla,$arraySelect);  
    $arrayPreparedWhere=recogerPrepararDatosWhere($tabla,$arrayWhere); 
   
    $consulta = $db->prepare("SELECT $arrayPreparedSelect FROM $tabla WHERE $arrayPreparedWhere");
   
    $result = $db->query($consulta);
    if (!$result) { 
        print "<p>Error en la consulta.</p>\n"; 
        return false;
    } 
    else {
          print "<p>Consulta ejecutada.</p>\n";
          foreach ($result as $valor) {
	    print "<p>$valor</p>\n";  //para comprobar, poner x campos
	  return true;
	}
    }
    $db = NULL;    
   
  } 
  protected function update($tabla,$arraySet,$arrayWhere){    

    $db = conectaDb();
    //$arrayPreparedSelect=recogerPrepararDatosSelect();
    $arrayPreparedWhere=recogerPrepararDatosWhere($tabla,$arrayWhere); 
    $arrayPreparedSet=recogerPrepararDatos_campoValor($tabla,$arraySet);   

    $consulta = $db->prepare("UPDATE $tabla SET $arrayPreparedSet WHERE $arrayPreparedWhere");
     
    if ($db->query($consulta)) {
       print "<p>Registro modificado correctamente.</p>\n"; 
       return true;
    } 
    else {  
       print "<p>Error al modificar el registro.</p>\n"; 
       return false;
    }
    $db = NULL;
   }

   protected function insert($tabla,$array){     

    $db = conectaDb();
    //$arrayPrepared=recogerPrepararDatosSelect($tabla,$array);
    $arrayPreparedInsert=recogerPrepararDatos_campoValor($tabla,$array);   
   
    $consulta = $db->prepare("INSERT INTO $tabla VALUES ($arrayPreparedInsert)");
 
    if ($db->query($consulta)) { 
       print "<p>Registro creado correctamente.</p>\n"; 
       return true;
    }
    else { 
       print "<p>Error al crear el registro.<p>"; 
       return false;
    }
    $db = NULL;
   }

  protected function delete($tabla,$arrayWhere){   
    $db = conectaDb();
    $arrayPreparedWhere=recogerPrepararDatosWhere($tabla,$arrayWhere); 

    $consulta = "DELETE FROM $tabla WHERE $arrayPreparedWhere";
    if ($db->query($consulta)) { 
        print "<p>Registro borrado correctamente.</p>\n";
        return true;
    } 
    else { 
        print "<p>Error al borrar el registro.</p>\n"; 
        return false;}
    $db = NULL;
  }
}
?>