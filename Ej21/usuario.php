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
	}
?>