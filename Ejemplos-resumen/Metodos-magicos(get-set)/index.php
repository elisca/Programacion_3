<?php
    class Persona{
        private $_nombre;
        private $_apellido;
        private $_dni;
        private $_edad;

        public function __construct($nombre,$apellido,$dni,$edad){
            $this->_nombre=$nombre;
            $this->_apellido=$apellido;
            $this->_dni=$dni;
            $this->_edad=$edad;
        }

        public function __get($nombre){
            echo "Mostrando " . $nombre . " ";
            return $this->$nombre;
        }

        public function __set($nombre,$valor){
            echo "Guardando en " . $nombre . " el valor " . $valor . "<br/>";
            $this->$nombre=$valor;
        }

        public function MostrarValores(){
            echo $this->_nombre . " " . $this->_apellido . "<br/>" ;
            echo $this->_dni . " " . $this->_edad . "<br/>";
        }
    }

    $objPersona=new Persona("Ezequiel","Lisca","36.763.479",29);
    $objPersona->MostrarValores();
    echo "Modificando valores:<br/>";
    $objPersona->_nombre="Nombre";
    $objPersona->_apellido="Apellido";
    $objPersona->_dni="1";
    $objPersona->_edad=1;
    $objPersona->MostrarValores();
?>