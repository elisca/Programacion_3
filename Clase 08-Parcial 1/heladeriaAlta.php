<?php
    require_once 'helado.php';

    Helado::leerJSON();

    $metPeticion=$_SERVER['REQUEST_METHOD'];

    switch ($metPeticion)
    {
        case 'POST':
            #require_once 'altaVenta.php';
            $objHelado=new Helado(-1,$_POST['sabor'],$_POST['tipo'],$_POST['precio'],$_POST['vaso'],$_POST['stock']);
            $objHelado->altaStock();
            break;
        default:
            echo "Petición no esperada.<br>";
            break;
    }
?>