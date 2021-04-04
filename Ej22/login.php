<?php
    require "./usuario.php";

    $mPeticion=$_SERVER['REQUEST_METHOD'];

    if($mPeticion=="POST"){
        Usuario::LeerUsuariosCSV("./registro.csv");
        if(count($_POST)==3){
            $objUsuario=new Usuario($_POST["nombre"],$_POST["clave"],$_POST["email"]);
            echo "Datos del usuario recibidos correctamente. Comprobando...<br/>";
            Usuario::VerificarUsuario($objUsuario);
        }
        else{
            echo "Los datos recibidos no son correctos.<br/>";
        }
    }
    else{
        echo "Se esperaba una petición POST.<br/>";
    }

?>