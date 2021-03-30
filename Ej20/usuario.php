<?php
	class Usuario{
		private $_nombre;
		private $_clave;
		private $_email;

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
	}
?>