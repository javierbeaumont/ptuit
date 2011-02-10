<?php

# ptuit
#
# Copyright © 2011 Gemma Agramonte <mail>
#
# This file is part of ptuit.
#
# ptuit is free software: you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as
# published by the Free Software Foundation, either version 3 of the
# License, or (at your option) any later version.
#
# ptuit is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU Affero General Public License for more details.
#
# You should have received a copy of the GNU Affero General Public License
# along with ptuit. If not, see <http://www.gnu.org/licenses/>.


class bd{

  protected $db;

  protected function conexionBd(){   //crea la conexion con la BD
    try {
        $this->db = new PDO('mysql:host='.DB_HOST, DB_USER, DB_PASSWORD);
        $this->db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
        return($this->db);
    } catch (PDOException $e) {       
        print "<p>Error: No puede conectarse con la BD." .$e->getMessage(). "</p>\n";
        exit();
    }
    $this->db=conexionBd();
  }

  protected function desconexionBd() {   //desconecta la BD por seguridad
   $this->db = NULL; 
  }

  protected function recogerPrepararDatosSelect($tabla,$array){   //con prepare recojo datos en vble array y le quito comas/comillas... etc.

    for ($i=0; $i<count($array); $i++)       
    {       
      if ($array[1]==null and $tabla=="usuario") $i++; 
      $a= $this->db;
      $a->bindParam($i,$array[$i]);
      $arrayPrepared[$i]=$array[$i].', ';      
      print ($arrayPrepared[$i]);
    }  
    $arrayPreparedSelect[$i]=rtrim($arrayPrepared[$i],", ");
    return $arrayPreparedSelect;    
}

 protected function recogerPrepararDatosWhere($tabla,$array){ 
 
    for ($i=0; $i<count($array); $i++)       
    { if ($array[1]==null and $tabla=="usuario") $i++;       
      $a= $this->db;
      $a->bindParam($i,$array[$i]);
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
      $a= $this->db;
      $a->bindParam($i,$array[$i]);          
      print ($array[$i]);
    }     

    // añado los = y las comas para formar la estructura
    foreach ($array as $campo=>$valor)
    {    $arrayPrepared= $arrayPrepared." ".$campo."=".$valor.", ";   }  //quitar =
    $arrayPrepared=rtrim($arrayPrepared,", ");
    return $arrayPrepared; 
}

//********************************* funciones select, update, insert y delete ****************************
  
  protected function select($tabla,$arraySelect,$arrayWhere){   

    $this->db = conexionBd();
    
    $consulta = $this->db->prepare("SELECT $arrayPreparedSelect FROM $tabla WHERE $arrayPreparedWhere");
    $arrayPreparedSelect=$this->recogerPrepararDatosSelect($tabla,$arraySelect);  
    $arrayPreparedWhere=$this->recogerPrepararDatosWhere($tabla,$arrayWhere); 
   
    $result = $this->db->query($consulta);
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
    $this->db = NULL;       
  } 

  protected function update($tabla,$arraySet,$arrayWhere){    

    $this->db = conexionBd();
    //$arrayPreparedSelect=recogerPrepararDatosSelect();
     
    $consulta = $this->db->prepare("UPDATE $tabla SET $arrayPreparedSet WHERE $arrayPreparedWhere");
    $arrayPreparedWhere=$this->recogerPrepararDatosWhere($tabla,$arrayWhere); 
    $arrayPreparedSet=$this->recogerPrepararDatos_campoValor($tabla,$arraySet); 
     
    if ($this->db->query($consulta)) {
       print "<p>Registro modificado correctamente.</p>\n"; 
       return true;
    } 
    else {  
       print "<p>Error al modificar el registro.</p>\n"; 
       return false;
    }
    $this->db = NULL;
   }

   protected function insert($tabla,$array){     

    $this->db=conexionBd();
    //$arrayPrepared=recogerPrepararDatosSelect($tabla,$array);
   
    $consulta=$this->db->prepare("INSERT INTO $tabla VALUES ($arrayPreparedInsert)");
    $arrayPreparedInsert=$this->recogerPrepararDatos_campoValor($tabla,$array);   
 
    if ($this->db->query($consulta)) { 
       print "<p>Registro creado correctamente.</p>\n"; 
       return true;
    }
    else { 
       print "<p>Error al crear el registro.<p>"; 
       return false;
    }
    $this->db = NULL;
   }

  protected function delete($tabla,$arrayWhere){   
    $this->db=conexionBd();
  
    $consulta="DELETE FROM $tabla WHERE $arrayPreparedWhere";
    $arrayPreparedWhere=$this->recogerPrepararDatosWhere($tabla,$arrayWhere); 

    if ($this->db->query($consulta)) { 
        print "<p>Registro borrado correctamente.</p>\n";
        return true;
    } 
    else { 
        print "<p>Error al borrar el registro.</p>\n"; 
        return false;}
    $this->db = NULL;
  }
}
?>