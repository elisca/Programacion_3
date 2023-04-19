<?php
    require 'usuario.php';

    $metPeticion=$_SERVER['REQUEST_METHOD'];

    if($metPeticion=="GET")
    {
        switch($_GET["lista_datos"])
        {
            case "usuarios":
                Usuario::leerUsuariosJSON();
                Usuario::mostrarUsuariosHTML();
                break;
            default:
                echo "Únicamente disponibles datos sobre usuarios.<br>";
                break;
        }
    }
    else
    {
        echo "Error, se esperaba petición GET.<br>";
    }
?>