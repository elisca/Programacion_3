<?php
	class Usuario{
		private $_nombre;
		private $_clave;
		private $_email;
        public static $_arrayUsuarios;

		public function __construct($nombre,$clave,$email){
			if(isset($nombre) && isset($clave) && isset($email)){
				$this->_nombre=$nombre;
				$this->_clave=$clave;
				$this->_email=$email;
			}
			else{
				echo "Se intentó crear un usuario pero falta ingreso de al menos un dato.<br/>";
			}
		}

		public function GetNombre(){
			return $this->_nombre;
		}

		public function GetClave(){
			return $this->_clave;
		}

		public function GetEmail(){
			return $this->_email;
		}

		public static function LeerUsuariosCSV($rutaArchivo){
            $archivoCSV=fopen($rutaArchivo,"r");
            
            if(isset($archivoCSV)){
                while($datos=fgetcsv($archivoCSV,0,",")){
                    if(!isset(Usuario::$_arrayUsuarios) && $datos!=NULL)
						Usuario::$_arrayUsuarios=array($datos);
                    else
                        array_push(Usuario::$_arrayUsuarios,$datos);
                }
                fclose($archivoCSV);
            }
            else
                echo "Error al intentar leer archivo CSV.<br/>";
        }

        public static function GenerarLista(){
            foreach(Usuario::$_arrayUsuarios As $v){
                echo "<ul>";
                foreach($v As $c){
                    echo "<li>" . $c . "</li>";
                }
                echo "</ul>";
            }
        }	
		
		public static function VerificarUsuario($usuario){
			$verifEmail=false;

			foreach(Usuario::$_arrayUsuarios As $k=>$u){
				#Se comprueba si el email recorrido es el del usuario
				if($u[2]==$usuario->GetEmail()){
					$verifEmail=true;
					#Email comprobado, se verifica si el usuario coincide
					if($u[0]==$usuario->GetNombre()){
						#Email y usuario comprobado, se verifica si la clave coincide
						if($u[1]==$usuario->GetClave()){
							#Usuario verificado
							echo "Usuario verificado.<br/>";
						}
						else{
							#Error en los datos, clave incorrecta
							echo "Error en los datos(clave incorrecta).<br/>";
						}
					}
					else{
							#Error en los datos, usuario incorrecto
							echo "Error en los datos(usuario incorrecto).<br/>";
					}
				}

				if($verifEmail)
					return;
			}
			echo "El usuario ingresado no existe.<br/>";
		}
	}
?>