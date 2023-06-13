<?php
    $metPeticion=$_SERVER['REQUEST_METHOD'];

    switch ($metPeticion) {        
        case 'DELETE':
            require_once 'pedido.php';
            require_once 'pizza.php';

            Pedido::leerPedidosJSON();

            $auxIdPed=Pedido::buscarPedido($_DELETE['id']);
            if($auxIdPed!=-1)
            {
                $auxPedido=Pedido::$_pedidos[$auxIdPed];
                $auxPedido=(array)Pedido::$_pedidos[$auxIdPed];

                $objPizza=new Pizza(-1,$auxPedido["_venta"]["_sabor"],$auxPedido["_venta"]["_tipo"],1,$auxPedido["_venta"]["_cantidad"]);
                if($objPizza->comprobarStock())
                {
                    $objPizza->descontarStock(true);
                    echo var_dump(Pedido::$_pedidos) . "<br>";
                    array_splice(Pedido::$_pedidos,[$auxIdPed],1);
                    echo var_dump(Pedido::$_pedidos) . "<br>";
                    print("Pedido eliminado.<br>");                    
                }
                else
                {
                    echo "No hay stock.<br>";
                }
            }
            else
            {
                echo "No se encuentra pedido.<br>";
            }
            break;
        default:
            echo "Error.<br>";
            break;
    }
?>