<?php
    require_once 'helado.php';
    require_once 'pedido.php';

    $metPeticion=$_SERVER['REQUEST_METHOD'];

    switch ($metPeticion)
    {
        case 'POST': 
            Helado::leerJSON();
            Pedido::leerPedidosJSON();
            $objHelado=new Helado(-1,$_POST['sabor'],$_POST['tipo'],1,$_POST['vaso'],$_POST['stock']);
            if($objHelado->comprobarStock())
            {
                $objHelado->descontarStock();
                $objPedido=new Pedido($objHelado,$_POST['email'],-1,date('d/n/Y'));
                $objPedido->altaPedido();
                echo "Si, hay stock.<br>";
                Pedido::guardarImagen($_POST["email"],$objHelado);
            }
            else
            {
                echo "No hay stock.<br>";
            }
            break;
        default:
            echo "ERROR, petición no esperada.<br>";
            break;
    }
?>