<?php
    $metPeticion=$_SERVER['REQUEST_METHOD'];

    switch ($metPeticion) {        
        case 'POST':
            require_once 'pedido.php';
            require_once 'helado.php';
            require_once 'cupon.php';

            Pedido::leerPedidosJSON();
            Cupon::leerJSON();

            $auxIdPed=Pedido::buscarPedido($_POST['num_pedido']);
            if($auxIdPed!=-1)
            {
                $auxPedido=Pedido::$_pedidos[$auxIdPed];
                $auxPedido=(array)Pedido::$_pedidos[$auxIdPed];

                $objHelado=new Helado(-1,$auxPedido["_venta"]["_sabor"],$auxPedido["_venta"]["_tipo"],1,$auxPedido["_venta"]["_vaso"],$auxPedido["_venta"]["_stock"]);
                if($objHelado->comprobarStock())
                {
                    $objCupon=new Cupon($_POST['num_pedido'],-1,10,"no usado",0,$_POST["imagen"]);
                    $objHelado->descontarStock(true);
                    echo var_dump(Pedido::$_pedidos) . "<br>";
                    array_splice(Pedido::$_pedidos,$auxIdPed,1);
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