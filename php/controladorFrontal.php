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
 * @mainpage ControladorFrontal
 * Descripcion de controladorFrontal:
 * Coge parametros controlador y accion del request de la pagina para mapear y redirigir las peticiones.
 * Se comprueba que existe el fichero /clases/.$controlador.php y si existe se incluye en el controlador Frontal para luego
 * llamar a la accion ($controlador->$accion).
 * Este metodo debe devolver una variable llamada $datosSalida que es un array donde se incluira el dato "pagina" que es una variable
 * que indica el nombre de la pagina a mostrar.
 * Los datos iran dentro de $datosSalida['datos'] que es otro array con datos para la pagina.
 * 
 *
 * @author rubentxu
 * @
 */
class controladorFrontal {

    public function __construct() {
        
    }

    public static function arranca() {

        $rutaClases = $_SERVER['DOCUMENT_ROOT'] . '/php/clases/';
        $rutaPaginas = $_SERVER['DOCUMENT_ROOT'] . '/web/';
        $rutaControlF = $_SERVER['DOCUMENT_ROOT'] . '/php/';
        include_once ($rutaClases . 'sesiones.php');

        if (isset($_GET['controlador'])) {
            $controlador = $_GET['controlador'];
        } else {
            if (isset($_POST['controlador'])) {
                $controlador = $_POST['controlador'];
            } else {
                $controlador = 'index';
            }
        }
        if (isset($_GET['accion'])) {
            $accion = $_GET['accion'];
        } else {
            $accion = 'index';
        }

//        $sesiones = new Sesiones();
//        if (!$sesiones->existeSesion()) {
//            $controlador = 'indexControl';
//            $accion = 'index';
//        }
        $controlador = $controlador . 'Control';

        $rutaControlador = $rutaClases . $controlador . '.php';

        if (file_exists($rutaControlador)) {
            include_once( $rutaControlador );
        } else {
            throw new Exception("No se encuentra el $controlador $rutaControlador");
        }

        if (class_exists($controlador, false)) {
            $cont = new $controlador();
        } else {
            throw new Exception("No carga el Controlador:   $controlador");
        }

        if (method_exists($cont, $accion)) {

            $datosSalida = $cont->$accion();
        } else {
            throw new Exception("No se encuentra la accion: $accion en controlador $controlador en la ruta $rutaControlador");
        }


        if (isset($datosSalida['pagina'])) {
            $rutapagina = $_SERVER['DOCUMENT_ROOT'] . '/web/' . $datosSalida['pagina'];
            if (isset($datosSalida['datos'])) {
                $datos = $datosSalida["datos"];
                echo '<?php  ' . $datos . '  ?>';
            }
            if (file_exists($rutapagina)) {
                include_once($rutapagina );
            } else {
                throw new Exception("No se encuentra la pagina a mostrar." . $rutapagina);
            }
        }
    }

}

?>