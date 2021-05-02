<?php
    class Usuario{
        public $_id;
        public $_nombre;
        public $_clave;

        public function __construct($id,$nombre,$clave){
            $this->_id=$id;
            $this->_nombre=$nombre;
            $this->_clave=$clave;
        }

        public static function ComprobarUsuarioExistente($arrayUsuarios,$usuario){
            foreach($arrayUsuarios As $auxUsuario){
                if($auxUsuario->_id==$usuario->_id)
                    return true;
            }
            return false;
        }

        public static function escribirJSON($array){
            $archivo=fopen('./usuarios.json','w');
    
            foreach($array As $usuario){
                fwrite($archivo,json_encode($usuario) . "\r\n");
            }
    
            fclose($archivo);
        }
    
        public static function leerJSON(){
            $archivo=fopen('./usuarios.json','r');
            $array=array();
    
            while($datos=json_decode(fgets($archivo),true))
            {
                if($datos!=null){
                    $datos=new Usuario($datos['_id'],$datos['_nombre'],$datos['_clave']);
                    array_push($array,$datos);
                }
            }
    
            fclose($archivo);
    
            return $array;
        }        
    }
?>