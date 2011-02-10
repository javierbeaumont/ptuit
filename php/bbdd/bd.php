<?php
include "../../web/conf.php";

class bd{

  private function conexionBd(){   //crea la conexion con la BD
    try {
        $db = new PDO('mysql:host='.DB_HOST, DB_USER, DB_PASSWORD);
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
        return($db);
    } catch (PDOException $e) {
        cabecera('Error grave');
        print "<p>Error: No puede conectarse con la BD.</p>\n";
        //  print "<p>Error: " . $e->getMessage() . "</p>\n";
        //pie();
        exit();
    }
    $db = conexionBd();
  }

  private function desconexionBd() {   //desconecta la BD por seguridad
   $db = NULL; 
  }

  private function recogerPrepararDatosSelect($tabla,$array){   //con prepare recojo datos en vble array y le quito comas/comillas... etc.

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

 private function recogerPrepararDatosWhere($tabla,$array){ 
 
    for ($i=0; $i<count($array); $i++)       
    { if ($array[1]==null and $tabla=="usuario") $i++;       
      $bd->bindParam($i,$array[$i]);
      $arrayPrepared[$i]= $arrayPrepared[$i]." ".$campos[$i]."=".$arrayPrepared[$i]." and ";       
      print ($arrayPrepared[$i]);
    }  
    $arrayPreparedWhere[$i]=rtrim($arrayPrepared[$i]," and ");
    return $arrayPreparedWhere; 
 }

 private function recogerPrepararDatos_campoValor($tabla,$array){    

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
  
  private function select($tabla,$array){   

    $db = conexionBd();
    $arrayPreparedSelect=recogerPrepararDatosSelect($tabla,$array);  
    $arrayPreparedWhere=recogerPrepararDatosWhere($tabla,$array); 
   
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
  private function update($tabla){    

    $db = conectaDb();
    //$arrayPreparedSelect=recogerPrepararDatosSelect();
    $arrayPreparedWhere=recogerPrepararDatosWhere($tabla,$array); 
    $arrayPreparedSet=recogerPrepararDatos_campoValor($tabla,$array);   

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

   private function insert($tabla){     

    $db = conectaDb();
    $arrayPrepared=recogerPrepararDatosSelect($tabla,$array);
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

  private function delete($tabla){   
    $db = conectaDb();
    $arrayPreparedWhere=recogerPrepararDatosWhere($tabla,$array); 

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