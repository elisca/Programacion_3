<?php
    require_once 'pizza.php';

    Pizza::leerJSON();
    $objPizza=new Pizza(-1,$_POST['sabor'],$_POST['tipo'],1,$_POST['cantidad']);
    if($objPizza->comprobarStock())
    {
        $objPizza->descontarStock();
        echo "Si, hay stock.<br>";
    }
    else
    {
        echo "No hay stock.<br>";
    }
?>