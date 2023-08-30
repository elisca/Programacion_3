<?php
    $numAct=1;
    $contNums=0;
    $acumNums=0;
    
    echo "Numeros contados:<br>";

    while($acumNums+$numAct+1 <= 1000){
        echo $numAct . ",";
        $numAct++;
        $contNums++;
        $acumNums+=$numAct;
    }

    echo "Suma total: " . $acumNums . "<br>";
    echo "Números contados: " . $contNums . "<br>";
?>