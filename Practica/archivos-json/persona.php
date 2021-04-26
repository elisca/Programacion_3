<?php
    class Persona{
        public $_nombre;
        public $_apellido;
        public $_edad;

        public function __construct($nombre,$apellido,$edad){
            $this->_nombre=$nombre;
            $this->_apellido=$apellido;
            $this->_edad=$edad;
        }

        public static function leerJSON($ruta){
            $archivo=fopen($ruta,'r');
            $array=array();

            while(!feof($archivo)){
                $auxObj=json_decode(fgets($archivo),true);
                if($auxObj['_nombre']!=null){
                    $persona=new Persona($auxObj['_nombre'],$auxObj['_apellido'],$auxObj['_edad']);
                    array_push($array,$persona);
                }
            }

            fclose($archivo);
            return $array;
        }

        public static function escribirJSON($array,$ruta){
            $archivo=fopen($ruta,'w');

            foreach($array As $p){
                fwrite($archivo,json_encode($p) . "\r\n");
            }

            fclose($archivo);
            echo "Archivo escrito.<br/>";
        }
    }
?>