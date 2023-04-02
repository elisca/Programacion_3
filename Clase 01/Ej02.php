<?php
    $fechaForm1=date('d/M/Y');
    $fechaForm2=date('l\, jS \of F Y');
    $fechaForm3=date('j-m-y');

    $fechaDia=date('j');
    $fechaMes=date('n');

    $estAnio=0; #1-Verano,2-Otoño,3-Invierno,4-Primavera

    print "Formato 1: $fechaForm1<br>";
    print "Formato 2: $fechaForm2<br>";
    print "Formato 3: $fechaForm3<br>";

    print "Estacion del año: ";

    switch($fechaMes)
    {
        case 1:
        case 2:
        case 3:
            if($fechaMes==3 && $fechaDia>=21)
                $estAnio=2;
            else
                $estAnio=1;
            break;
        case 4:
        case 5:
        case 6:
            if($fechaMes==6 && $fechaDia>=21)
                $estAnio=3;
            else
                $estAnio=2;
            break;
        case 7:
        case 8:
        case 9:
            if($fechaMes==9 && $fechaDia>=21)
                $estAnio=4;
            else
                $estAnio=3;
            break;
        case 10:
        case 11:
        case 12:
            if($fechaMes==12 && $fechaDia>=21)
                $estAnio=1;
            else
                $estAnio=4;
            break;
    }

    switch($estAnio)
    {
        case 1:
            print "Verano.";
            break;
        case 2:
            print "Otoño.";
            break;
        case 3:
            print "Invierno.";
            break;
        case 4:
            print "Primavera.";
            break;
    }
    echo "<br>";
?>