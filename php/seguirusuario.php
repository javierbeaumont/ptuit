 <?php
# ptuit
#
# Copyright © 2011 Mikel Martinez eta Igarki Rico <ptuit@ptuit.org>
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



	include '../web/conf.php';
        include 'sesiones.php';        

//* Funcion conectar a la base de datos. Devuelve la conexion.           
	    function connect(){
	      Sesiones::crearSesion(5); //Codigo de prueba
	      $link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD); 
              mysql_select_db(DB_NAME, $link); 
	      return $link;
            }

//* Funcion mostrar los ultimos mensajes de los usuarios que estas siguiendo (Followings).
	    function showMessages(){ 
	       $link=connect();    
               $login=$_SESSION['idUser'];
               $sql="SELECT usuario.nombre, mensaje.mensaje FROM seguirusuario JOIN mensaje JOIN usuario WHERE seguirusuario.idseguidor='$login' && seguirusuario.idseguido=mensaje.usuario && seguirusuario.idseguido=usuario.id ORDER BY mensaje.fecha;";
               $result = mysql_query($sql, $link); 
               while ($row = mysql_fetch_row($result)){            
                  echo "$row[0] &nbsp;"; 
                  echo "$row[1] <br/>";            
               }  
             }

//* Funcion mostrar la lista de usuarios que estas siguiendo (Followings).
	   function showFollowing(){
		$link=connect();
		$login=$_SESSION['idUser'];
		$sql="SELECT usuario.nombre FROM usuario JOIN seguirusuario WHERE seguirusuario.idseguidor='$login' && seguirusuario.idseguido=usuario.id;";
		$result = mysql_query($sql, $link); 
                while ($row = mysql_fetch_row($result)){            
                  echo "$row[0] <br/>";                         
               }  
             }

?> 
