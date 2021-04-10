<?php
    require 'usuario.php';

    $mPeticion=$_SERVER['REQUEST_METHOD'];

    if($mPeticion=='POST'){
        if(isset($_POST['nombre']) && isset($_POST['clave']) && isset($_POST['email']) && isset($_FILES['nombre_foto']['name'])){
            $auxNombre=$_POST['nombre'];
            $auxClave=$_POST['clave'];
            $auxEmail=$_POST['email'];

            
            $nombreFoto=$auxNombre . "." . pathinfo($_FILES['nombre_foto']['name'],PATHINFO_EXTENSION);
            $destinoFoto='./usuario/fotos/' . $nombreFoto;
            if(move_uploaded_file($_FILES['nombre_foto']['tmp_name'],$destinoFoto))
                echo "Imagen de usuario " . $auxNombre . " cargada correctamente.<br/>";
            else
                echo "No se pudo cargar la imagen del usuario " . $auxNombre . " por un error no definido.<br/>"            ;

            $auxUsuario=new Usuario($auxNombre,$auxClave,$auxEmail,$nombreFoto);
            
            Usuario::GuardarUsuario($auxUsuario);

            echo var_dump(Usuario::LeerUsuarios()) . "<br/>";
        }
    }
    else{
        echo "Sólo se admiten peticiones por métodos POST.<br/>";
    }
?>