<?php

private class bd{

  private function conexionBd(){
    try {
        $db = new PDO('mysql:host=localhost', 'root', '');
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
        return($db);
    } catch (PDOException $e) {
        cabecera('Error grave');
        print "<p>Error: No puede conectarse con la BD.</p>\n";
     //  print "<p>Error: " . $e->getMessage() . "</p>\n";
        pie();
        exit();
    }
    $db = conexionBd();
  }

  private function desconexionBd() {
   $db = NULL; 
  }






  private function recogerDatos{

    //$permiso=array($_GET['name'],$_GET['password']);


  /*  if USUARIO.name=$_GET['name'] and USUARIO.password=$_GET['password'] then
    

    $tabla=array("nombreTabla", "b", "c");
    array_push($tabla, "d", "e", "f"); 

    foreach ($tabla as $actual)
    echo $actual . "<br>"; */

   /* $stmt = $bd->prepare("CAST SomeStoredProcedure(?, ?)");
      $stmt ->execute(array($someInParameter1, $someInParameter2)); */
  }

  private function recogerConsulta($campos){

  //prepare recojo datos en vble string y separado con comas.

  /*$stmt = $bd->prepare("SELECT * FROM ? where name = ?");
    if ($stmt->execute(array($_GET['name']))) {
    while ($row = $stmt->fetch()) {
      print_r($row);
    }

    $stmt = $bd->prepare("SELECT * FROM ? where name LIKE ?");
    $stmt->execute(array("%$_GET[name]%"));*/

}
  
  private function select($campos){

    $db = conexionBd();

    $consulta = "SELECT $campos FROM $tabla"; 
    $result = $db->query($consulta);
    if (!$result) { print "<p>Error en la consulta.</p>\n";} 
    else {
        print "<p>Consulta ejecutada.</p>\n";
	foreach ($result as $valor) {
	    print "<p>$valor[nombre] $valor[password]</p>\n";  //para comprobar, poner x campos
	}
    }
    $db = NULL;
    /*$stmt->execute();    
    print "procedure returned $return_value\n";*/
}
 

  private function insert($campos){

    $db = conectaDb();
    $consulta = "INSERT INTO $tabla values (NULL, $campos)";
    if ($db->query($consulta)) { print "<p>Registro creado correctamente.</p>\n"; }
    else { print "<p>Error al crear el registro.<p>"; }
    $db = NULL;

  }

  private function delete($campos){
    $db = conectaDb();
    $consulta = "DELETE FROM $tabla WHERE id=$indice";
    if ($db->query($consulta)) { print "<p>Registro borrado correctamente.</p>\n";} 
    else { print "<p>Error al borrar el registro.</p>\n"; }
    $db = NULL;
}

  private function update($campos){

    $db = conectaDb();
    $consulta = "UPDATE $tabla SET nombre=$nombre, apellidos=$apellidos, correo=$correo 
                 WHERE id=$modificar";  //pasar $campos
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
