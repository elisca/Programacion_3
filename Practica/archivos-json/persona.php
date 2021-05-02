<?php
    class Persona{
        public $_nombre;
        public $_clave;
        public $_email;

        public function __construct($nombre,$clave,$email){
            $this->_nombre=$nombre;
            $this->_clave=$clave;
            $this->_email=$email;
        }

        public static function leerPersonas(){
            $arrayPersonas=array();
            
            $archivo=fopen('./personas.json','r');

            //Leer archivo
            while(!feof($archivo)){
                $auxDatos=json_decode(fgets($archivo),true);
                if($auxDatos!=null){
                    $auxPers=new Persona($auxDatos['_nombre'],$auxDatos['_clave'],$auxDatos['_email']);
                    array_push($arrayPersonas,$auxPers);
                }
            }

            fclose($archivo);

            return $arrayPersonas;
        }

        public static function guardarPersonas($arrayPersonas){
            $archivo=fopen('./personas0.json','w');

            //Escribir archivo
            foreach($arrayPersonas As $persona){
                fwrite($archivo,json_encode($persona) . "\r\n");
            }

            fclose($archivo);
        }
    }
?>