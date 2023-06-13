<?php
    $metPeticion=$_SERVER['REQUEST_METHOD'];

    switch ($metPeticion) {
        case 'GET':
            require_once 'consultasVentas.php';
            break;
        case 'POST':
            require_once 'heladeriaAlta.php';
            require_once 'heladoConsultar.php';
            require_once 'altaVenta.php';
            require_once 'devolverHelado.php';
            break;
        default:
            echo "Petición no esperada.<br>";
            break;
    }
?>