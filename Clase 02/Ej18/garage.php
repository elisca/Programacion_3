<?php
    require_once 'auto.php';

    class Garage
    {
        private $_razonSocial;
        private $_precioPorHora;
        private $_autos=[];

        public function __construct($razonSocial,$precioHora=0)
        {
            $this->_razonSocial=$razonSocial;
            $this->_precioPorHora=$precioHora;
            echo "Auto creado.<br>";
        }

        public function MostrarGarage()
        {
            echo "Garage: " . $this->_razonSocial . " Precio Hora: $" . $this->_precioPorHora . "<br>";
            echo "Autos:<br>";

            foreach ($this->_autos as $vAuto) {
                Auto::MostrarAuto($vAuto);
            }
        }

        public function Equals($auto)
        {
            $retorno=false;

            foreach ($this->_autos as $vAuto) {
                if($vAuto->Equals($auto))
                {
                    $retorno=true;
                    break;
                }
            }
            return $retorno;
        }

        public function Add($auto)
        {
            if(!$this->Equals($auto))
            {
                echo "Auto agregado al garage.<br>";
                array_push($this->_autos,$auto);
            }
            else
                echo "El auto que se intenta agregar al garage ya está dentro.<br>";
        }

        public function Remove($auto)
        {
            $autoEncontrado=false;

            for($i=0;$i<count($this->_autos);$i++)
            {
                if($this->_autos[$i]->Equals($auto))
                {
                    array_splice($this->_autos,$i,1);
                    $autoEncontrado=true;
                    echo "Auto quitado del garage.<br>";
                    break;
                }
            }

            if(!$autoEncontrado)
                echo "El auto que se intenta quitar del garage no está dentro.<br>";
        }
    }
?>