<?php
    $fecha=date("d/m/y");
    $dia=date("d");
    $mes=date("m");

    $estacion=null;

    switch ($mes) {
        case ($mes==12 && $dia>=21) || ($mes<=3 && $dia<21):
            $estacion = "Verano";
            break;
        case ($mes>=3 && $mes<6) || ($mes==6 && $dia<21):
            $estacion = "Otoño";
            break;
        case ($mes>=6 && $mes<9) || ($mes==9 && $dia<21):
            $estacion = "Invierno";
            break;
        case ($mes>=9 && $mes<12) || ($mes==12 && $dia<21):
            $estacion = "Primavera";
            break;
        default:
            echo "Error al intentar determinar la estación del año.<br>";
            break;
    }

    echo "Fecha actual: " . $fecha . "<br>";
    echo "Estación del año: " . $estacion . "<br>";
?>