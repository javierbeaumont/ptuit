<?php

		/**
		*@class Sesiones
		*/
		class Sesiones{
		
			/**Se crea la sesion del usuario logueado.
				@param[in] $id Se recibe como parametro el identificador del usuario y se guarda en la sesion.
			*/
			public function crearSesion($id){
				session_start();
				$_SESSION['idUser'] = $id;
			}
			
			/**Se comprueba si existe la sesion de algun usuario.
				@return true si existe la sesion de algun usuario.
				@return false si no existe la sesion de ningun usuario.
			*/
			public function existeSesion(){
				@session_start();
				if(isset($_SESSION['idUser'])){
					return true;
				}else{
					return false;
				}
			}

			/**Se borra la sesion del usuario.*/
			public function borrarSesion(){	
				session_start();
				$_SESSION = array();
				session_destroy();
			}
		}
		
	
	


?>