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

        public static function leerCSV($ruta){
            $archivo=fopen($ruta,'r');
            $array=array();

            while($datos=fgetcsv($archivo)){
                $tmpUsuario=new Persona($datos[0],$datos[1],$datos[2]);
                array_push($array,$tmpUsuario);
            }

            fclose($archivo);
            return $array;
        }

        public static function escribirCSV($array,$ruta){
            $archivo=fopen($ruta,'w');

            foreach($array As $p){
                $auxDatos=array($p->_nombre,$p->_apellido,$p->_edad);
                fputcsv($archivo,$auxDatos);
            }

            fclose($archivo);
            echo "Archivo escrito.<br/>";
        }
    }
?>