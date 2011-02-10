 <?php

# ptuit
#
# Copyright © 2011 Mikel Martinez e Igarki Rico <ptuit@ptuit.org>
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
############################################################################
	
	include '../web/conf.php';
        include 'clases/sesiones.php';        

           function seleccionmensajes(){  
                Sesiones::crearSesion(5); //Codigo de prueba
         	$login=$_SESSION['idUser'];
           	$sql="SELECT usuario.nombre, mensaje.mensaje FROM seguirusuario JOIN mensaje JOIN usuario WHERE seguirusuario.idseguidor='$login' && seguirusuario.idseguido=mensaje.usuario && seguirusuario.idseguido=usuario.id ORDER BY mensaje.fecha;";
                $link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD); 
                mysql_select_db(DB_NAME, $link); 
                $result = mysql_query($sql, $link); 
                while ($row = mysql_fetch_row($result)){            
                  echo "$row[0] &nbsp;"; 
                  echo "$row[1] <br/>";            
                }  
           }
?> 
