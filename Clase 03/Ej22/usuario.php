<?php
    class Usuario
    {
        private $_nombre;
        private $_clave;
        private $_mail;
        static private $_usuarios=[];

        public function __construct($nombre,$clave,$mail)
        {
            $this->_nombre=$nombre;
            $this->_clave=$clave;
            $this->_mail=$mail;
        }

        static function altaUsuario($nombre,$clave,$mail){
            $auxUsuario=new Usuario($nombre,$clave,$mail);
            array_push(Usuario::$_usuarios,$auxUsuario);
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
                echo "Error al intentar leer archivo CSV.<br>";
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
    }
?>