<?php
    require 'auto.php';
    require 'garage.php';

    #Crear tres objetos “Auto”.
    $auto01=new Auto("Peugeot","Blanco");
    $auto02=new Auto("Fiat","Negro");
    $auto03=new Auto("Fiat","Negro");

    #Crear dos garages.
    $garage01=new Garage("Garage 01");
    $garage02=new Garage("Garage 02",500);

    #Mostrar garage.
    $garage02->MostrarGarage();

    #Agregar autos.
    $garage02->Add($auto01);
    $garage02->Add($auto02);
    $garage02->Add($auto03);

    #Quitar autos.
    $garage02->Remove($auto01);
    $garage02->Remove($auto01);
?>