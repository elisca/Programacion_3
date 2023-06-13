<?php
    $metPeticion=$_SERVER['REQUEST_METHOD'];

    switch ($metPeticion) {        
        case 'POST':
            require_once 'pedido.php';
            require_once 'pizza.php';

            Pizza::leerJSON();
            Pedido::leerPedidosJSON();

            $auxIdPed=Pedido::buscarPedido($_POST['id']);
            if($auxIdPed!=-1)
            {
                $auxPedido=Pedido::$_pedidos[$auxIdPed];
                $auxPedido=(array)Pedido::$_pedidos[$auxIdPed];

                $objPizza=new Pizza(-1,$auxPedido["_venta"]["_sabor"],$auxPedido["_venta"]["_tipo"],1,$auxPedido["_venta"]["_cantidad"]);
                if($objPizza->comprobarStock())
                {
                    $objPizza->descontarStock(true);
                    $objPizza->_sabor=$_POST['sabor'];
                    $objPizza->_tipo=$_POST['tipo'];
                    $objPizza->_cantidad=$_POST['cantidad'];
                    print("Pedido modificado.<br>");                    
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