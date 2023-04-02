<?php
    $iNum=1;
    $acumSuma=0;

    echo "Numeros sumados: ";
    while($acumSuma+$iNum<=1000)
    {
        if($iNum>1)
            echo ",";

        $acumSuma+=$iNum;
        echo $iNum;

        $iNum++;
    }
    $iNum--;

    echo "<br>Suma total: ", $acumSuma, "<br>";
    echo "Cantidad de números sumados: ", $iNum;
?>