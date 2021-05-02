<?php
    class Producto{
        public $_ID;
        public $_codBarra;
        public $_nombre;
        public $_tipo;
        public $_stock;
        public $_precio;

        public function __construct($codBarra,$nombre,$tipo,$stock,$precio,$ID=-1){
            if($ID!=-1){
                $this->_ID=$ID;
            }
            else{
                $this->_ID=rand(1,10000);
            }
            $this->_codBarra=$codBarra;
            $this->_nombre=$nombre;
            $this->_tipo=$tipo;
            $this->_stock=$stock;
            $this->_precio=$precio;
        }
        
        public function Equals($producto){
            return !strcmp($this->_codBarra,$producto->_codBarra);
        }

        public static function ConfirmarProductoExistente($arrayProductos,$producto){

            foreach($arrayProductos As $k=>$p){
                if($p->Equals($producto)){
                    return $k;
                }
            }
            return -1;
        }

        public static function escribirJSON($array){
            $archivo=fopen('./productos.json','w');
    
            foreach($array As $prod){
                fwrite($archivo,json_encode($prod) . "\r\n");
            }
    
            fclose($archivo);
        }
    
        public static function leerJSON(){
            $archivo=fopen('./productos.json','r');
            $array=array();
    
            while($datos=json_decode(fgets($archivo),true))
            {
                if($datos!=null){
                    $datos=new Producto($datos['_codBarra'],$datos['_nombre'],$datos['_tipo'],$datos['_stock'],$datos['_precio'],$datos['_ID']);
                    array_push($array,$datos);
                }
            }
    
            fclose($archivo);
    
            return $array;
        }
    }
?>