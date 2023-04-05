<?php
    require 'auto.php';

    #Crear dos objetos “Auto” de la misma marca y distinto color.
    $auto01=new Auto("Peugeot","Blanco");
    $auto02=new Auto("Peugeot","Negro");

    #Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
    $auto03=new Auto("Fiat","Gris",100000);
    $auto04=new Auto("Fiat","Gris",110000);
    
    #Crear un objeto “Auto” utilizando la sobrecarga restante.
    $auto05=new Auto("Jeep","Azul",120000,'1/4/2023');

    #Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500 al atributo precio.
    $auto03->AgregarImpuestos(1500);
    $auto04->AgregarImpuestos(1500);
    $auto05->AgregarImpuestos(1500);

    #Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el resultado obtenido.
    echo "Auto01+Auto02: $" . Auto::Add($auto01,$auto02) . "<br>";

    #Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no.
    echo "Auto01=Auto02: " . $auto01->Equals($auto02) . "<br>";
    echo "Auto01=Auto05: " . $auto01->Equals($auto05) . "<br>";
?>