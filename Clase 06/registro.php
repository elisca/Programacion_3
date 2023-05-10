<?php
    $metPeticion=$_SERVER['REQUEST_METHOD'];

    switch($metPeticion){
        case "POST":
            break;
        default:
            echo "Método de petición inesperada.<br>";
            break;
    }
?>