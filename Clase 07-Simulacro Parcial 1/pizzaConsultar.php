<?php
    require_once 'pizza.php';

    Pizza::leerJSON();
    $objPizza=new Pizza(-1,$_POST['sabor'],$_POST['tipo'],1,1);
    if($objPizza->buscarPizza()<0)
    {
        echo "No existe sabor o tipo.<br>";
    }
    else
    {
        echo "Si, hay stock.<br>";
    } 
?>