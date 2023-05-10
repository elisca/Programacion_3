<?php
    require_once 'pizza.php';

    Pizza::leerJSON();
    $objPizza=new Pizza(-1,$_GET['sabor'],$_GET['tipo'],$_GET['precio'],$_GET['cantidad']);
    $objPizza->altaStock()  
?>