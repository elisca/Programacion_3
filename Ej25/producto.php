<?php
    class Producto{
        public $_ID;
        public $_codBarra;
        public $_nombre;
        public $_tipo;
        public $_stock;
        public $_precio;

        public function __construct($ID,$codBarra,$nombre,$tipo,$stock,$precio){
            $this->_ID=$ID;
            $this->_codBarra=$codBarra;
            $this->_nombre=$nombre;
            $this->_tipo=$tipo;
            $this->_stock=$stock;
            $this->_precio=$precio;
        }
        
        public function Equals($producto){}

        public static function ProductoExistente($producto){

        }
    }
?>