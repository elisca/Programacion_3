<?php
    require_once 'pizza.php';
    require_once 'pedido.php';

    Pizza::leerJSON();
    Pedido::leerPedidosJSON();
    $objPizza=new Pizza(-1,$_POST['sabor'],$_POST['tipo'],1,$_POST['cantidad']);
    if($objPizza->comprobarStock())
    {
        $objPizza->descontarStock();
        $objPedido=new Pedido($objPizza,$_POST['email'],-1,date('d/M/Y'));
        $objPedido->altaPedido();
        echo "Si, hay stock.<br>";
        Pedido::guardarImagen($_POST["email"],$objPizza);
    }
    else
    {
        echo "No hay stock.<br>";
    }
?>