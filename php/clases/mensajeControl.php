<?php

/*
  Copyright (C) <2011>  <rubentxu>

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU Affero General Public License as
  published by the Free Software Foundation, either version 3 of the
  License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU Affero General Public License for more details.

  You should have received a copy of the GNU Affero General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.

 */

/**
 * Descripcion indexControl: este archivo sera llamado por el controlador frontal.
 * se debe retornar un array que incluya los datos "pagina" y "datos"
 * (datos puede ser otro array que incluya todo los datos variables  de la pagina.
 *
 * @author rubentxu
 */

class mensajeControl {

    public function cogerMensaje() {

    return array("pagina"=>"cajaMensajes.php","datos"=>"HOLA A TODOS ESTO ES PTUIT ");

    }

}

?>
