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
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="expires" content="-1" />
        
        <title>Ptuit </title>
        <link rel="stylesheet" href="/web/css/style.css" type="text/css"/>
        <script type="text/javascript" src="/web/js/jquery.js"></script>
        <script type="text/javascript" src="/web/js/contadorTexto.js"></script>
       <script type="text/javascript">
           $(function(){
                 var refreshTime = 0;
                 function refresh(){
                         $.get('index.php',{},function(callback){
                         $('body').html(callback);
                         refreshTime = setTimeout(refresh,5000); // tiempo entre refrescos 5 segundos
                           });
                 }
     
            refresh();
	     });
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
                   <script >
                     $ultimoId.load(obtenerUltimoId.php);
                     $mensajesNuevos.load(obtenerMensajesNuevos.php, $ultimoId[0]);
                     $.getJSON($mensajesNuevos, function(data) {
                          var items = [];
                          $.each(data, function(id, usuario, fecha, mensaje) {
                          items.push('<div><p> 'id+ usuario+fecha' <br /> 'mensaje' </p> </div>');
                          });

                    $(items.appendTo('#caja_men')).fadeIn(3000);

                   });

                 </script>
                    
                </div>


            </div>
        </div>

        <div id="footer">
            <div id="cc">Ptuit 2011 </div>
        </div>
    </body>

</html>
