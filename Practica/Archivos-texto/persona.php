<?php
    class Persona{
        public $_id;
        public $_nombre;
        public $_apellido;
        public $_email;
        public $_sexo;
        public $_ip;

        public function __construct($id,$nombre,$apellido,$email,$sexo,$ip){
            $this->_id=$id;
            $this->_nombre=$nombre;
            $this->_apellido=$apellido;
            $this->_email=$email;
            $this->_sexo=$sexo;
            $this->_ip=$ip;
        }

        public static function leerPersonas(){
            $arrayPersonas=array();
            
            $archivo=fopen('./personas.txt','r');

            while(!feof($archivo)){
                $auxDatos=explode(',',fgets($archivo));
                $auxPers=new Persona($auxDatos[0],$auxDatos[1],$auxDatos[2],$auxDatos[3],$auxDatos[4],$auxDatos[5]);
                array_push($arrayPersonas,$auxPers);
            }

            fclose($archivo);

            return $arrayPersonas;
        }

        public static function guardarPersonas($arrayPersonas){
            $archivo=fopen('./personas0.txt','w');

            //Guardar archivo
            foreach($arrayPersonas As $auxPers){
                $auxDatos=array($auxPers->_id,$auxPers->_nombre,$auxPers->_apellido,$auxPers->_email,$auxPers->_sexo,$auxPers->_ip);
                $texto=implode(',',$auxDatos);
                fwrite($archivo,$texto . "\r\n");
            }

            fclose($archivo);
        }
    }
?>