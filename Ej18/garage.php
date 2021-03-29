<?php
	require "auto.php";

	class Garage{
		private $_razonSocial="";
		private $_precioPorHora=0;
		private $_autos=array();

		public function __construct($razonSocial,$precioHora=0){
			$this->_razonSocial=$razonSocial;
			$this->_precioPorHora=$precioHora;
		}

		public function MostrarGarage(){
			echo "Razon social: $this->_razonSocial Precio hora: \$$this->_precioPorHora<br/>";
			echo "Autos:<br/>";

			foreach ($this->_autos as $key => $value) {
				if(isset($this->_autos[$key]))
					Auto::MostrarAuto($this->_autos[$key]);
			}
		}

		public function Equals($auto){
			$idAuto=$this->GetAutoID($auto);
			if($idAuto!=-1)
				return true;
			return false;
		}

		public function Add($auto){
			if(!$this->Equals($auto)){
				array_push($this->_autos,$auto);
			}
			else{
				echo "Se intento agregar un auto ya existente en dicho garage.<br/>";
			}
		}

		public function Remove($auto){
			$idAuto=$this->GetAutoID($auto);
			if($idAuto!=-1){
				unset($this->_autos[$idAuto]);
			}
			else
				echo "Se intento quitar un auto no existente en dicho garage.<br/>";
		}

		#Funcion complementaria, devuelve el ID del auto, de no existir -1.
		public function GetAutoID($auto){
			for($i=0;$i<count($this->_autos);$i++){
				if($this->_autos[$i]->Equals($auto)){
					return $i;
				}
			}
			return -1;
		}
	}
?>