<?php

private class bd{

  private function conexionBd(){   //crea la conexion con la BD
    try {
        $db = new PDO('mysql:host=localhost', 'root', '');
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






  private function recogerPrepararDatos($tabla,$array){  
  //con prepare recojo datos en vble array y le quito comas/comillas... etc.

    for ($i=0; $i<count($array); $i++)  
    {       
      $bd->bindParam($i,$array[$i]);
      $arrayPrepared[$i]=$array[$i].', ';      
      print ($arrayPrepared[$i]);
    }  
    $arrayPrepared[$i]=rtrim($arrayPrepared[$i],", ");
    return $arrayPrepared;

   /* $stmt = $db->prepare("INSERT INTO REGISTRY (name, value) VALUES (:name, :value)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':value', $value);*/

    //$permiso=array($_GET['name'],$_GET['password']);
    /*  if USUARIO.name=$_GET['name'] and USUARIO.password=$_GET['password'] then
    
    $tabla=array("nombreTabla", "b", "c");
    array_push($tabla, "d", "e", "f"); 
      
   /*
    $stmt = $bd->prepare("SELECT * FROM ? where name = ?");
    if ($stmt->execute(array($_GET['name']))) {
    while ($row = $stmt->fetch()) {
      print_r($row);
    }
*/
}
  
  private function select($tabla){   

    $db = conexionBd();
    $arrayPrepared=recogerPrepararDatos();
    $consulta = $db->prepare("SELECT $arrayPrepared FROM $tabla");
   
    $result = $db->query($consulta);
    if (!$result) { print "<p>Error en la consulta.</p>\n";} 
    else {
          print "<p>Consulta ejecutada.</p>\n";
          foreach ($result as $valor) {
	    print "<p>$valor</p>\n";  //para comprobar, poner x campos
	}
    }
    $db = NULL;
    /*$stmt->execute();    
    print "procedure returned $return_value\n";*/
} 

  private function insert($tabla){     

    $db = conectaDb();
    $arrayPrepared=recogerPrepararDatos();

    $consulta = $db->prepare("INSERT INTO $tabla VALUES ($arrayPrepared)");
 
    if ($db->query($consulta)) { print "<p>Registro creado correctamente.</p>\n"; }
    else { print "<p>Error al crear el registro.<p>"; }
    $db = NULL;
  }

  private function delete($tabla){   
    $db = conectaDb();
    $arrayPrepared=recogerPrepararDatos();

    $consulta = "DELETE FROM $tabla WHERE id=$arrayPrepared[0]";
    if ($db->query($consulta)) { print "<p>Registro borrado correctamente.</p>\n";} 
    else { print "<p>Error al borrar el registro.</p>\n"; }
    $db = NULL;
}

  private function update($tabla, $campos){    // $campos es un array con los nombres de los camposTabla

    $db = conectaDb();
    $arrayPrepared=recogerPrepararDatos();

    for ($i=0; $i<count($arrayPrepared); $i++)  
    {
      if ($arrayPrepared[1]==null)  $i++;      
      $arrayPrepared[$i]= $arrayPrepared[$i]." ".$campos[$i]."=".$arrayPrepared[$i].", ";      
      print ($arrayPrepared[$i]);
    }      
    $arrayPrepared[$i]=rtrim($arrayPrepared[$i],", ");

    $consulta = $db->prepare("UPDATE $tabla SET $arrayPrepared WHERE id=$arrayPrepared[0]");
     
    if ($db->query($consulta)) { print "<p>Registro modificado correctamente.</p>\n"; } 
    else {  print "<p>Error al modificar el registro.</p>\n"; }
    $db = NULL;
}


/*try {
    $bd = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
    foreach($bd->query('SELECT * from FOO') as $row) {
        print_r($row);
    }
    $bd = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}*/
?>