<?php
    class Venta{
        public $_idVenta;
        public $_idUsuario;
        public $_cantidad;

        public function __construct($idVenta,$idUsuario,$cantidad){
            $this->_idVenta=$idVenta;
            $this->_idUsuario=$idUsuario;
            $this->_cantidad=$cantidad;
        }

        public static function escribirJSON($array){
            $archivo=fopen('./ventas.json','w');
    
            foreach($array As $venta){
                fwrite($archivo,json_encode($venta) . "\r\n");
            }
    
            fclose($archivo);
        }
    
        public static function leerJSON(){
            $archivo=fopen('./ventas.json','r');
            $array=array();
    
            while($datos=json_decode(fgets($archivo),true))
            {
                if($datos!=null){
                    $datos=new Venta($datos['_idVenta'],$datos['_idUsuario'],$datos['_cantidad']);
                    array_push($array,$datos);
                }
            }
    
            fclose($archivo);
    
            return $array;
        }
    }
?>