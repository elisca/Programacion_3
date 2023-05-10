<?php
    $metPeticion=$_SERVER['REQUEST_METHOD'];

    switch ($metPeticion) {
        case 'GET':
            require_once 'pizzaCarga.php';
            break;
        case 'POST':
            require_once 'pizzaConsultar.php';
            break;
        default:
            echo "Petición no esperada.<br>";
            break;
    }
?>