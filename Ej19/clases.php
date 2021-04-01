<?php
	class Pasajero{
		private $_apellido;
		private $_nombre;
		private $_dni;
		private $_esPlus;

		public function __construct($apellido,$nombre,$dni,$plus){
			if(isset($apellido) && isset($nombre) && isset($dni) && isset($plus)){
				$this->_apellido=$apellido;
				$this->_nombre=$nombre;
				$this->_dni=$dni;
				$this->_esPlus=$plus;
			}
			else
				echo "Error al intentar instanciar un objeto pasajero.<br/>";
		}

		public function Equals($pasajero){
			if(!strcmp($this->_dni,$pasajero->_dni))
				return true;
			else
				return false;
		}

		public function GetInfoPasajero(){
			return "DNI: " . $this->_dni . " Nombre: " . $this->_nombre . " Apellido: " . $this->_apellido . " Plus: " . $this->_esPlus . "<br/>";
		}

		public static function MostrarPasajero($pasajero){
			return $pasajero->GetInfoPasajero();
		}

		public function GetPlus(){
			return $this->_esPlus;
		}
	}

	class Vuelo{
		private $_fecha;
		private $_empresa;
		private $_precio;
		private $_listaDePasajeros;
		private $_cantMaxima;

		public function __construct($empresa,$precio,$cantMaxima=0){
			if(isset($empresa) && isset($precio)){
				$this->_empresa=$empresa;
				$this->_precio=$precio;
				$this->_cantMaxima=$cantMaxima;

				$this->_fecha=date('d/M/Y');
				$this->_listaDePasajeros=array();
			}
			else
				echo "Error al intentar instanciar un objeto pasajero.<br/>";
		}

		public function GetInfoVuelo(){
			echo "---------------------------------------------------------------------<br/>";
			echo "Fecha: " . $this->_fecha . " Empresa: " . $this->_empresa . " Precio: \$" . $this->_precio . " Cant. Max. Pasajeros: " . $this->_cantMaxima . "<br/>";
			echo "Información de pasajeros:<br/>";

			foreach ($this->_listaDePasajeros As $p) {
				echo Pasajero::MostrarPasajero($p) . "<br/>";
			}
			echo "---------------------------------------------------------------------<br/>";
		}

		public function AgregarPasajero($pasajero){
			if(!Vuelo::PasajeroExistente($this,$pasajero) && count($this->_listaDePasajeros)<$this->_cantMaxima)
				array_push($this->_listaDePasajeros,$pasajero);
			else
				echo "El pasajero que se intenta agregar ya está inscripto al vuelo o ya se alcanzó la cantidad máxima de pasajeros.<br/>";
		}

		public static function Add($vuelo1,$vuelo2){
			$acumVuelo1=0;
			$acumVuelo2=0;
			$pagoTotal=0;

			foreach ($vuelo1->_listaDePasajeros as $pv1) {
				$pagoPasajero=$vuelo1->_precio;
				if($pv1->GetPlus())
					$pagoPasajero*=0.8;

				$acumVuelo1+=$pagoPasajero;
			}

			foreach ($vuelo2->_listaDePasajeros as $pv2) {
				$pagoPasajero=$vuelo2->_precio;
				if($pv2->GetPlus())
					$pagoPasajero*=0.8;

				$acumVuelo2+=$pagoPasajero;
			}

			$pagoTotal=$acumVuelo1+$acumVuelo2;
			return $pagoTotal;
		}

		public static function Remove($vuelo,$pasajero){
			$flagP=false;
			foreach ($vuelo->_listaDePasajeros as $k=>$p) {
				if(Vuelo::PasajeroExistente($vuelo,$pasajero)){
					unset($vuelo->_listaDePasajeros[$k]);
					$flagP=true;
				}
			}
			if(!$flagP)
				echo "No se encontró en el vuelo al pasajero que se deseaba eliminar de la lista.<br/>";
			return $vuelo;
		}

		private static function PasajeroExistente($vuelo,$pasajero){
			foreach ($vuelo->_listaDePasajeros as $k=>$p) {
				if($p->Equals($pasajero))
					return true;
			}
			return false;
		}
	}
?>