<?php
    class Persona{
        public $_nombre;
        public $_apellido;
        public $_dni;
        public $_edad;

        public function __constructor($nombre,$apellido,$dni,$edad){
            $this->_nombre=$nombre;
            $this->_apellido=$apellido;
            $this->_dni=$dni;
            $this->_edad=$edad;
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo,$valor){
            $this->$atributo=$valor;
        }

        public function ToString(){
            echo "Nombre: " . $this->_nombre . " Apellido: " . $this->_apellido . "<br/>";
            echo "DNI: " . $this->_dni . " Edad: " . $this->_edad . "<br/>";
        }
    }
?>