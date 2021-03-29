<?php
	class Auto{
		private $_color;
		private $_precio;
		private $_marca;
		private $_fecha;

		public function __construct($color,$precio=0,$marca,$fecha='1/1/2021'){
			$this->_color=$color;
			$this->_precio=$precio;
			$this->_marca=$marca;
			$this->_fecha=$fecha;
		}

		public function AgregarImpuestos($impuesto){
			$this->_precio+=$impuesto;
		}

		public static function MostrarAuto($auto){
			if(isset($auto)){
				echo "Características del auto:<br/>";
				echo "Color: $auto->_color Precio: \$$auto->_precio Marca: $auto->_marca Fecha: $auto->_fecha<br/>";
			}
		}

		public function Equals($auto2){
			if(!strcmp($this->_marca,$auto2->_marca))
				return true;
			else
				return false;
		}

		public static function Add($auto1,$auto2){
			$sumPrecios=0;

			if($auto1->Equals($auto2)){
				if(!strcmp($auto1->_color,$auto2->_color)){
					$sumPrecios=$auto1->_precio+$auto2->_precio;
				}
			}

			return $sumPrecios;
		}
	}
?>