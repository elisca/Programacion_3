<?php
    require_once 'pizza.php';
    require_once 'pedido.php';

    Pedido::leerPedidosJSON();

    #a- la cantidad de pizzas vendidas
    echo "Cantidad de pizzas vendidas: " . Pedido::contarCantidadVendida() . "<br>";

    #b- el listado de ventas entre dos fechas ordenado por sabor.
    Pedido::listarVentasPorFechas($_GET["desde_fecha"],$_GET["hasta_fecha"]);    

    #c- el listado de ventas de un usuario ingresado
    Pedido::listarVentasPorUsuario($_GET["usuario"]);

    #d- el listado de ventas de un sabor ingresado
    Pedido::listarVentasPorSabor($_GET["sabor"]);
?>