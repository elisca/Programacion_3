<?php
    require_once 'usuario.php';

    $metPeticion=$_SERVER['REQUEST_METHOD'];

    if($metPeticion=="POST")
    {
        Usuario::leerUsuariosJSON();
        Usuario::registrarUsuario($_POST["nombre"],$_POST["clave"],$_POST["mail"]);
        Usuario::guardarUsuariosJSON();
    }
    else
    {
        echo "Error, se esperaba petición POST.<br>";
    }
?>