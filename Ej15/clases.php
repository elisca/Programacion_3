<?php
	abstract class FiguraGeometrica{
		protected $_color="blue";
		protected $_perimetro=0;
		protected $_superficie=0;

		public function __construct(){}
		abstract public function Dibujar();
		abstract protected function CalcularDatos();
		public function ToString(){}
		public function GetColor(){
			return $this->_color;
		}
		public function SetColor($color){
			$this->_color=$color;
		}
	}

	class Rectangulo extends FiguraGeometrica{
		private $_ladoDos=0;
		private $_ladoUno=0;

		public function __construct($l1,$l2){
			$this->_ladoUno=$l1;
			$this->_ladoDos=$l2;
			$this->CalcularDatos();
		}

		protected function CalcularDatos(){
			$this->_perimetro=$this->_ladoUno*2+$this->_ladoDos*2;
			$this->_superficie=$this->_ladoUno*$this->_ladoDos;
		}
		public function Dibujar(){
			$colorTexto=$this->GetColor();

			for($i=1;$i<=$this->_ladoDos;$i++){
				for($j=1;$j<=$this->_ladoUno;$j++){
					echo "<font color=$colorTexto>*</font>";
				}
				echo "<br/>";
			}
		}
		public function ToString(){
			echo "Figura geométrica: " . "Rectángulo" . "<br/>";
			echo "Lado uno: $this->_ladoUno Lado dos: $this->_ladoDos " . "<br/>";
			echo "Perímetro: " . $this->_perimetro . "<br/>";
			echo "Superficie: " . $this->_superficie . "<br/>";
		}
	}

	class Triangulo extends FiguraGeometrica{
		private $_base=0;
		private $_altura=0;

		public function __construct($b,$h){
			$this->_base=$b;
			$this->_altura=$h;
			$this->CalcularDatos();
		}

		protected function CalcularDatos(){
			$this->_perimetro=$this->_base+$this->_altura*2;
			$this->_superficie=$this->_base*$this->_altura/2;
		}
		public function Dibujar(){
			$colorTexto=$this->GetColor();
			#Hacer funcion de dibujar triangulo
			echo "<font color=$colorTexto>Funcion de dibujar triangulo pendiente.<br/></font>";
		}
		public function ToString(){
			echo "Figura geométrica: " . "Triángulo" . "<br/>";
			echo "Base: $this->_base Altura: $this->_altura" . "<br/>";
			echo "Perímetro: " . $this->_perimetro . "<br/>";
			echo "Superficie: " . $this->_superficie . "<br/>";
		}
	}
?>