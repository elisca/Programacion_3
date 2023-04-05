<?php
    class Auto
    {
        private $_color;
        private $_precio;
        private $_marca;
        private $_fecha;

        public function __construct($marca,$color,$precio=0,$fecha='4/4/2023')
        {
            $this->_marca=$marca;
            $this->_color=$color;
            $this->_precio=$precio;
            $this->_fecha=$fecha;
        }

        public function AgregarImpuestos($valor)
        {
            if($valor>0)
                $this->_precio+=$valor;
            else
                echo "El valor del impuesto debe ser mayor a 0.<br>";
        }

        static function MostrarAuto($auto)
        {
            echo "Marca: $auto->_marca Color: $auto->_color Precio: $$auto->_precio Fecha: $auto->_fecha<br>";
        }

        public function Equals($autoB)
        {
            $retorno=null;

            if(!strcmp($this->_marca,$autoB->_marca))
                $retorno=true;
            else
                $retorno=false;
            
            return $retorno;
        }

        static function Add($autoA,$autoB)
        {
            $retorno=null;

            if($autoA->Equals($autoB) && !strcmp($autoA->_color,$autoB->_color))
                $retorno=$autoA->_precio+$autoB->_precio;
            else
            {
                $retorno=0;
                echo "Los autos no son coincidentes, no pueden sumarse sus valores.<br>";
            }
            return $retorno;
        }
    }
?>