<?php
    require_once 'helado.php';
    require_once 'pedido.php';

    Pedido::leerPedidosJSON();

    #a- La cantidad de Helados vendidos en un día en particular(se envía por parámetro), si no se pasa fecha, se muestran las del día de ayer.
    echo "Cantidad de helados vendidas: " . Pedido::contarCantidadVendida($_GET['fecha']) . "<br>";

    #b- el listado de ventas de un usuario ingresado
    Pedido::listarVentasPorUsuario($_GET["usuario"]);

    #c- c- El listado de ventas entre dos fechas ordenado por nombre.
    Pedido::listarVentasPorFechas($_GET["desde_fecha"],$_GET["hasta_fecha"]);    

    #d- El listado de ventas por sabor ingresado.
    Pedido::listarVentasPorSabor($_GET["sabor"]);

    #e- El listado de ventas por vaso Cucurucho.
    Pedido::listarVentasPorVaso($_GET["vaso"]);
?>