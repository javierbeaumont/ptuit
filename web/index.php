<?php
# ptuit
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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">


    <head>
        <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE"/>
        <meta http-equiv="cache-control" content="no-cache"/>
        
        <title>Ptuit </title>
        <link rel="stylesheet" href="/web/css/style.css" type="text/css"/>
        <script type="text/javascript" src="/web/js/jquery.js"></script>
        <script type="text/javascript" src="/web/js/contadorTexto.js"></script>
        <script type="text/JavaScript">
            function timedRefresh(timeoutPeriod) {
                setTimeout("location.reload(true);",timeoutPeriod);
            }
        </script>
    </head>

    <body >

        <div id="header">
            <img src="/web/imagen/logo.png" alt="ptuit" />
            <a id="registro" href="registro.php">Registrarse</a>
            <a id="login" href="login.php">Login</a>
        </div>

        <div id="content">
            <div id="marco">
                <div id="cajaMensaje">
                    <form action="/php/iniciar.php" method="post">
                        <fieldset >
                            <legend>Escribe tu ptuit</legend>
                            <textarea class="txtMen" name="mensaje" title="mensaje" cols="63" rows="2" ></textarea>
                            <div class="contador" ></div>
                            <input id="botonTxt" title="enviar" name="ptuit" value="ptuit.." type="button"/>
                        </fieldset>
                    </form>
                </div>
                <div id="caja_men" >
                    <fieldset >
                        <script type="text/javascript">

                            /*llamada para obtener el id del mensaje onload="JavaScript:timedRefresh(5000)";*/


                            /*llamada para obtener los mensajes nuevos*/

                            //                            include("/php/obtenerMensajesNuevos.php");
                            //                            $mensajesNuevos= obtenerMensajesNuevos($idmensaje);
                            //
                            //                            $.getJSON($mensajesNuevos, function(data) {
                            //                                var items = [];
                            //
                            //                                $.each(data, function(id, usuario, fecha, mensaje) {
                            //                                    items.push('<div id=\"'+fecha+'\"><p> '+id+usuario+fecha+' <br /> '+mensaje+' </p> </div>');
                            //                                });
                            //
                            //                                items.appendTo('#caja_men');
                            //
                            //                            });
                            //
                            //
                            //                            /* comprobar que hay mensajes nuevos*/
                            //                            /*Si hay mensajes nuevos*/
                            //                            /*
                            //                                          for(var i=1; i</*numero de mensajes; i++){
                            //                                            /*añadir mensajes mediante
                            //
                            //                                              var cm = document.getElementById("caja_men");
                            //                                              var div = document.createElement("div");
                            //                                              var p = document.createElement("p");
                            //                                            var texto = document.createTextNode(/*mensaje*);
                            //
                            //                                              p.appendChild(texto);
                            //                                              div.appendChild(p);
                            //                                              div.attributes.setNamedItem("class").nodeValue = "mensaje";
                            //                                              div.attributes.setNamedItem("id").nodeValue = /*fecha del mensaje*/;
                            //                            cm.appenchild(div);
                            //
                            //                            /*efecto para añadir mensaje
                            //
                            //                                              $("#").fadeIn(3000);
                            //
                            //                                              /*control de numero de mensajes
                            //                                              var men = document.getElementsByTagName(".mensaje");
                            //                                              /*20 mensajes como maximo
                            //                                              if(men.length==20){
                            //                                                  var men_elim = document.getElementsByTagName(".mensaje")[19];
                            //                                                  document.body.removeChild(men_elim);
                            //                                              }
                            //                                        }
                            //                                    }
                            //                                });*/

                        </script>
                    </fieldset>
                </div>


            </div>
        </div>

        <div id="footer">
            <div id="cc">Ptuit 2011 </div>
        </div>
    </body>

</html>
