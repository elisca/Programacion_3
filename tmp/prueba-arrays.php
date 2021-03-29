<?php
	class Numeros{
		private $arrayNums=array();

		public function __construct(){}

		public function AgregarElementoInicio($num){
			array_unshift($this->arrayNums,$num);
		}

		public function QuitarElementoInicio(){
			array_shift($this->arrayNums);
		}

		public function AgregarElementoFinal($num){
			array_push($this->arrayNums,$num);
		}

		public function QuitarElementoFinal(){
			array_pop($this->arrayNums);
		}

		public function MostrarArray(){
			var_dump($this->arrayNums);
			echo "<br/>";
		}
	}

	class Persona{
		private $_nombre;
		private $_apellido;
		private $_edad;
		private $_sexo;

		public function __construct($nombre,$apellido,$edad,$sexo){
			$this->SetNombre($nombre);
			$this->SetApellido($apellido);
			$this->SetEdad($edad);
			$this->SetSexo($sexo);
		}

		public function GetNombre(){
			return $this->_nombre;
		}

		public function SetNombre($nombre){
			if(strcmp($nombre,"")){
				$this->_nombre=$nombre;
				return true;
			}
			return false;
		}

		public function GetApellido(){
			return $this->_apellido;
		}

		public function SetApellido($apellido){
			if(strcmp($apellido,"")){
				$this->_apellido=$apellido;
				return true;
			}
			return false;
		}

		public function GetEdad(){
			return $this->_edad;
		}

		public function SetEdad($edad){
			if($edad>=0){
				$this->_edad=$edad;
				return true;
			}
			else{
				echo "Error al intentar ingresar edad.<br/>";
				return false;
			}
		}

		public function GetSexo(){
			return $this->_sexo;
		}

		public function SetSexo($sexo){
			if($sexo=='m' || $sexo=='f' || $sexo=='M' || $sexo=='F'){
				$this->_sexo=$sexo;
				return true;
			}
			else{
				echo "Error al intentar ingresar sexo.<br/>";
				return false;
			}
		}

		public function ToString(){
			echo "Nombre completo: " . $this->GetNombre() . " " . $this->GetApellido()  . "<br/>";
			echo "Edad: " . $this->GetEdad() . "<br/>";
			echo "Sexo: " . $this->GetSexo() . "<br/>";
		}
	}

	class Empleado extends Persona{
		private $_profesion;
		private $_salario;

		public function __construct($nombre,$apellido,$edad,$sexo,$profesion,$salario){
			parent::__construct($nombre,$apellido,$edad,$sexo);
			$this->SetProfesion($profesion);
			$this->SetSalario($salario);
		}

		public function GetProfesion(){
			return $this->_profesion;
		}

		public function SetProfesion($profesion){
			if(strcmp($profesion,"")){
				$this->_profesion=$profesion;
				return true;
			}
			return false;
		}

		public function GetSalario(){
			return $this->_salario;
		}

		public function SetSalario($salario){
			if($salario>=0){
				$this->_salario=$salario;
				return true;
			}
			return false;
		}

		public function ToString(){
			parent::ToString();
			echo "Profesion: " . $this->GetProfesion() . "<br/>";
			echo "Salario: $" . $this->GetSalario() . "<br/>";
		}

		public function MostrarDatos(){
			parent::ToString();
			echo parent::GetNombre() . "<br/>";
			echo parent::GetApellido() . "<br/>";
			echo "Modifique la funcion.<br/>";
		}
	}
?>