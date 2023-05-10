<?php
    class Producto
    {
        private $_id;
        private $_codBarra;
        private $_nombre;
        private $_tipo;
        private $_stock;
        private $_precio;

        private $_listaProductos=[];

        public function __construct($codBarra,$nombre,$tipo,$stock,$precio)
        {
            $this->_id=rand(1,10000);
            $this->getCodBarra($codBarra);
            $this->_nombre=$nombre;
            $this->_tipo=$tipo;
            $this->getStock($stock);
            $this->getPrecio($precio);
        }

        private function getCodBarra($valor)
        {
            if(is_numeric($valor) && ($valor>=100000 && $valor<=999999))
                $this->_codBarra=$valor;
            else
            {
                echo "ERROR: El código de barras recibido no es numérico o tiene una longitud distinta a 6 caracteres.<br>";
                $this->_codBarra=100000;
            }
        }

        private function getStock($valor)
        {
            if(is_numeric($valor) && $valor>=0)
                $this->_stock=$valor;
            else
            {
                echo "ERROR: La cantidad de stock recibida no es numérica o es negativa.<br>";
                $this->_stock=0;
            }
        }

        private function getPrecio($valor)
        {
            if(is_numeric($valor) && $valor>=0)
                $this->_stock=$valor;
            else
            {
                echo "ERROR: El precio recibida no es numérico o es negativo.<br>";
                $this->_precio=0;
            }
        }

        public function altaProducto($codBarra,$nombre,$tipo,$stock,$precio){}
    }
?>