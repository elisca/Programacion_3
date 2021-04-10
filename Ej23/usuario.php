<?php
	class Usuario{
		const MIN_ID=1;
		const MAX_ID=10000;
		
		public $_ID;
		public $_nombre;
		public $_clave;
		public $_email;
		public $_fechaReg;
		public $_nombreFoto;

		public function __construct($nombre,$clave,$email,$nombreFoto){
			if(isset($nombre) && isset($clave) && isset($email)){
				$this->_nombre=$nombre;
				$this->_clave=$clave;
				$this->_email=$email;
				$this->SetID();
				$this->SetFechaRegistro();
				$this->_nombreFoto=$nombreFoto;
			}
			else{
				echo "Se intentó crear un usuario pero falta ingreso de al menos un dato.<br/>";
			}
		}

		public function SetID(){
			$this->_ID=rand(self::MIN_ID,self::MAX_ID);
		}

		public function SetFechaRegistro(){
			$this->_fechaReg=date('d-m-Y');
		}

		public function ToString(){
			return json_encode($this);
		}

		public static function GuardarUsuario($objUsuario){
			$archivoDatos=fopen('usuarios.dat','a');

			if(isset($archivoDatos)){
				fwrite($archivoDatos,$objUsuario->ToString() . "\r\n");				
				fclose($archivoDatos);
			}
			else{
				echo "Error al intentar abrir el archivo para agregar datos.<br/>";
			}

		}

		public static function LeerUsuarios(){
			$arrayUsuarios=array();

			$archivoDatos=fopen('usuarios.dat','r');

			if(isset($archivoDatos)){
				while (!feof($archivoDatos)) {
					$auxObj=json_decode(fgets($archivoDatos),true);
					if($auxObj!=null){
						$auxUsuario=new Usuario($auxObj['_nombre'],$auxObj['_clave'],$auxObj['_email'],$auxObj['_nombreFoto']);
						$auxUsuario->_fechaReg=$auxObj['_fechaReg'];
						$auxUsuario->_ID=$auxObj['_ID'];
						array_push($arrayUsuarios,$auxUsuario);
					}
				}
				fclose($archivoDatos);
				return $arrayUsuarios;
			}
			else{
				echo "Error al intentar abrir el archivo para leer datos.<br/>";				
				return false;
			}
		}
	}
?>