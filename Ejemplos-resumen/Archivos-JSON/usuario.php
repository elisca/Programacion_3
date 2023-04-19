<?php
	class Usuario{
		public $_nombre;
		public $_clave;
		public $_email;

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
	}
?>