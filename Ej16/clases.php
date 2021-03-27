<?php
	class Rectangulo{
		private $_vertice1;
		private $_vertice2;
		private $_vertice3;
		private $_vertice4;
		public $area;
		public $ladoDos;
		public $ladoUno;
		public $perimetro;

		public function __construct($v1,$v3) {
			$this->_vertice1=$v1;
			$this->_vertice3=$v3;

			//Se define coordenadas para el vertice 2
			$v2X=$v3->GetX();
			$v2Y=$v1->GetY();

			//Se define coordenadas para el vertice 4
			$v4X=$v1->GetX();
			$v4Y=$v3->GetY();

			//Se definen los vertices 2 y 4 en base a los vertices 1 y 3
			$this->_vertice2=new Punto($v2X,$v2Y);
			$this->_vertice4=new Punto($v4X,$v4Y);

			//Distancia de los puntos v1 y v3(base)
			$absBase=abs($this->_vertice1->GetX()-$this->_vertice3->GetX());
			//Distancia de los puntos v1 y v3(altura)
			$absAltura=abs($this->_vertice1->GetY()-$this->_vertice3->GetY());

			$this->ladoUno=$absBase;
			$this->ladoDos=$absAltura;
			$this->area=$absBase*$absAltura;
			$this->perimetro=$absBase*2+$absAltura*2;

			echo "Se creó un rectángulo. Datos:<br/>";
			echo "Lado uno: $this->ladoUno Lado dos: $this->ladoDos<br/>";
			echo "Área: $this->area Perímetro: $this->perimetro<br/>";
		}

		public function Dibujar(){
			for($i=1;$i<=$this->ladoUno;$i++){
				for($j=1;$j<=$this->ladoDos;$j++){
					echo "*";
				}
				echo "<br/>";
			}
		}
	}

	class Punto{
		private $_x;
		private $_y;

		public function __construct($x,$y){
			$this->_x=$x;
			$this->_y=$y;
		}
		
		public function GetX(){
			return $this->_x;
		}

		public function GetY(){
			return $this->_y;
		}
	}
?>