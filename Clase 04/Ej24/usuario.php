<?php

use Usuario as GlobalUsuario;

    class Usuario
    {
        public $_id;
        public $_fechaReg;
        public $_rutaAvatar;
        public $_nombre;
        public $_clave;
        public $_mail;
        static public $_usuarios=[];

        public function __construct($id,$fechaReg,$rutaAvatar,$nombre,$clave,$mail)
        {
            $this->_id=$id;
            $this->_fechaReg=$fechaReg;
            $this->_rutaAvatar=$rutaAvatar;
            $this->_nombre=$nombre;
            $this->_clave=$clave;
            $this->_mail=$mail;
        }

        static function altaUsuario($id,$fechaReg,$rutaAvatar,$nombre,$clave,$mail){
            $auxUsuario=new Usuario($id,$fechaReg,$rutaAvatar,$nombre,$clave,$mail);
            array_push(Usuario::$_usuarios,$auxUsuario);
        }

        static function registrarUsuario($nombre,$clave,$mail)
        {
            $idReg=rand(1,10000);
            $fechaReg=date('d/m/Y');
            $foto = "./Usuario/Fotos/" . $_FILES["foto"]["name"];
            move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);

            Usuario::altaUsuario($idReg,$fechaReg,$foto,$nombre,$clave,$mail);
        }

        static function grabarUsuarios()
        {
            $archivoCSV=fopen("usuarios.csv","w");

            if($archivoCSV!=false)
            {
                foreach (Usuario::$_usuarios as $vUsuario)
                {
                    $campos=[$vUsuario->_nombre,$vUsuario->_clave,$vUsuario->_mail];
                    fputcsv($archivoCSV,$campos);
                }
                fclose($archivoCSV);

                echo "Archivo CSV grabado exitosamente.<br>";
            }
            else
                echo "Error al intentar grabar archivo CSV.<br>";
        }

        static function leerUsuarios()
        {
            $archivoCSV=fopen("usuarios.csv","r");

            if($archivoCSV!=false)
            {
                while($datos=fgetcsv($archivoCSV,0,",",'"'))
                {
                    Usuario::altaUsuario($datos[0],$datos[1],$datos[2]);
                }
                fclose($archivoCSV);

                echo "Archivo CSV leído exitosamente.<br>";
            }
            else
                echo "Error al intentar leer archivo CSV.<br>";
        }

        static function mostrarUsuarios()
        {
            foreach (Usuario::$_usuarios as $vUsuario)
                echo "Nombre: " . $vUsuario->_nombre . " Clave: " . $vUsuario->_clave . " Mail: " . $vUsuario->_mail . "<br>";
        }

        static function mostrarUsuariosHTML()
        {
            echo "<ul>";
            foreach (Usuario::$_usuarios as $vUsuario)
                echo "<li>Nombre: " . $vUsuario->_nombre . " Clave: " . $vUsuario->_clave . " Mail: " . $vUsuario->_mail . "</li>";
            echo "</ul>";
        }

        static function validarUsuario($auxUsuario)
        {
            $usuarioReg=false;

            foreach (Usuario::$_usuarios as $vUsuario)
            {
                #Mail correcto
                if(!strcmp($vUsuario->_mail,$auxUsuario->_mail))
                {
                    $usuarioReg=true;

                    #Contraseña correcta
                    if(!strcmp($vUsuario->_clave,$auxUsuario->_clave))
                        echo "Verificado.<br>";
                    #Contraseña incorrecta
                    else
                        echo "Error en los datos.<br>";
                    break;
                }
            }

            if(!$usuarioReg)
                echo "Usuario no registrado.<br>";
        }

        static function guardarUsuariosJSON()
        {
            $archivoJSON=fopen("usuarios.json","a");

            if($archivoJSON!=false)
            {
                foreach (Usuario::$_usuarios as $vUsuario)
                {
                    fwrite($archivoJSON,json_encode($vUsuario) . "\r\n");
                }
                fclose($archivoJSON);

                echo "Archivo JSON grabado exitosamente.<br>";
            }
            else
                echo "Error al intentar grabar archivo JSON.<br>";
        }

        static function leerUsuariosJSON()
        {
            $archivoJSON=fopen("usuarios.json","r");

            if($archivoJSON!=false)
            {
                while(!feof($archivoJSON)){
                    $auxObj=json_decode(fgets($archivoJSON),true);
                    if($auxObj!=null){
                        $auxUsuario=new Usuario($auxObj['_id'],$auxObj['_fechaReg'],$auxObj['_rutaAvatar'],$auxObj['_nombre'],$auxObj['_clave'],$auxObj['_mail']);
                        array_push(Usuario::$_usuarios,$auxUsuario);
                    }
                }
                fclose($archivoJSON);
            
                echo "Archivo JSON leído exitosamente.<br>";
            }
            else
                echo "Error al intentar leer archivo JSON.<br>";
        }
    }
?>