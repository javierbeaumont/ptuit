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

    $consulta = "SELECT $campos FROM $tabla"; //poner la tabla deseada
    $result = $db->query($consulta);
    if (!$result) { print "<p>Error en la consulta.</p>\n";} 
    else {
	foreach ($result as $valor) {
	    print "<p>$valor[nombre] $valor[password]</p>\n";  //para comprobar, poner x campos
	}
    }
  
    /*$stmt->execute();    
    print "procedure returned $return_value\n";*/
}
 

  private function insert{

  }

  private function delete{

  }

  private function update{

  }

 
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
