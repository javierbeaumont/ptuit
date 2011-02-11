<?php
# ptuit
#
# Copyright © 2011 ESTIBALIZ AINAGA <estitxuainaga@gmail.com>
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

/** Testing the inserting to the datebase*/
include "../../../web/conf.php";
include "../../bbdd/bd.php";
  
  class PruebaInsert extends bd {

    function LlamadaInsert(){
      $obj = new bd;

      $array=array(99, "pruebacontraseña", 'jorge', 'jorge@jorge.com');
      
      return $obj->insert('usuario',$array);
      echo 'hola';

    }
}
$obj2 =new PruebaInsert;
print_r ($obj2->LlamadaInsert());


?>