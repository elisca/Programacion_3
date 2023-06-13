<?php
    require_once 'pizza.php';

    Pizza::leerJSON();

    $metPeticion=$_SERVER['REQUEST_METHOD'];

    switch ($metPeticion)
    {
        case 'GET':
            $objPizza=new Pizza(-1,$_GET['sabor'],$_GET['tipo'],$_GET['precio'],$_GET['cantidad']);
            $objPizza->altaStock();
            break;
        case 'POST':
            require_once 'altaVenta.php';
            break;
        default:
            echo "Petición no esperada.<br>";
            break;
    }
?>