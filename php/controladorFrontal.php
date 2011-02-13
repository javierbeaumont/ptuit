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

    private $rutaClases;
    private $rutaPaginas;
    private $rutaControlF;
    private $controlador;
    private $accion;
    private $usuario;

    public

    function __construct() {

        $this->rutaClases = $_SERVER['DOCUMENT_ROOT'] . '/php/clases/';
        $this->rutaPaginas = $_SERVER['DOCUMENT_ROOT'] . '/web/';
        $this->rutaControlF = $_SERVER['DOCUMENT_ROOT'] . '/php/';
        $this->controlador = "index";
        $this->accion = "index";
        $this->usuario = "anonimo";
    }

    function arranca() {

        try {

            $rutaLibSesiones = $this->rutaClases . 'Sesiones.php';
            if (file_exists($rutaLibSesiones)) {
                include_once( $rutaLibSesiones );
            } else {
                throw new Exception("No se encuentra la libreria $rutaLibSesiones");
            }
            $sesionLib = NULL;
            if (class_exists('Sesiones', false)) {
                $sesionLib = new Sesiones();
            } else {
                throw new Exception("No carga la libreria:   $rutaLibSesiones");
            }
            
            if (!$sesionLib->existeSesion()) {
                $_SESSION['idUser'] = $this->usuario;
            };

            $this->comprobarPeticion();
            $d = $this->ejecutarAccion();
            $this->imprimirPagina($d);
        } catch (Exception $exc) {
            echo "Fallo en Controlador Frontal--- " . $exc->getTraceAsString();
        }
    }

    function comprobarPeticion() {

        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                if (isset($_GET['controlador'])) {
                    $this->controlador = $_GET['controlador'];
                }
                if (isset($_GET['accion'])) {
                    $this->accion = $_GET['accion'];
                }
                break;
            case 'POST':
                if (isset($_POST['controlador'])) {
                    $this->controlador = $_POST['controlador'];
                }
                if (isset($_POST['accion'])) {
                    $this->accion = $_POST['accion'];
                }
                break;

            default:
                $this->controlador = 'index';
                $this->accion = 'index';
                break;
        }
    }

    function ejecutarAccion() {

        $controlador = $this->controlador . 'Control';
        $accion = $this->accion;

        $rutaControlador = $this->rutaClases . $controlador . '.php';

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

            return $datosSalida = $cont->$accion();
        } else {
            throw new Exception("No se encuentra la accion: $accion en controlador $controlador en la ruta $rutaControlador");
        }
    }

    function imprimirPagina($datosSalida) {

        if (isset($datosSalida['pagina'])) {
            if ($datosSalida['pagina'] == "json") {
                header('Cache-Control: no-cache, must-revalidate');
                header('Content-type: application/json; charset=utf-8');

                if (isset($datosSalida['datos'])) {

                    echo json_encode($datosSalida['datos']);
                } else {
                    echo "{datos: nohay}";
                }
            } else {
                header('Content-Type: text/html; charset=utf-8');
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

}

?>