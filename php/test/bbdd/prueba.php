<?php
# ptuit
#
# Copyright © 2011 Jordan Lagos <Jordanlagosg@gmail.com>
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

/**
 * Test conexión base de datos
 */

include("../../bbdd/bd.php");

class otra extends bd {

  function llamada () {
    $obj = new bd;
    return $obj->conexionBd();
  }
}

$obj2 = new otra;
print_r ($obj2->llamada());


?>