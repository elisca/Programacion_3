<?php
    require "usuario.php";

    $metPeticion=$_SERVER['REQUEST_METHOD'];

    if($metPeticion=="POST")
    {
        Usuario::leerUsuarios();
        $pUsuario=new Usuario("tmp",$_POST["clave"],$_POST["mail"]);
        Usuario::validarUsuario($pUsuario);
    }
    else
    {
        echo "Error, se esperaba petición POST.<br>";
    }
?>