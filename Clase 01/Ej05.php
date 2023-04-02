<?php
    $num=60;
    $uNum=$num%10;
    $dNum=($num-$uNum)/10;

    $decNombre="";
    $uniNombre="";

    if($num<20 || $num>60)
        print "Solo se admiten numeros entre 20 y 60.<br>";
    else
    {
        switch($uNum)
        {
            case 1:
                $uniNombre="uno";
                break;
            case 2:
                $uniNombre="dos";
                break;
            case 3:
                $uniNombre="tres";
                break;
            case 4:
                $uniNombre="cuatro";
                break;
            case 5:
                $uniNombre="cinco";
                break;
            case 6:
                $uniNombre="seis";
                break;
            case 7:
                $uniNombre="siete";
                break;
            case 8:
                $uniNombre="ocho";
                break;
            case 9:
                $uniNombre="nueve";
                break;
            default:
                $uniNombre="cero";
                break;
        }

        switch($dNum)
        {
            case 2:
                if($uNum==0)
                    print "Veinte.<br>";
                else
                {
                    $decNombre="Veinti";
                    print "$decNombre$uniNombre.<br>";
                }
                break;
            case 3:
                if($uNum==0)
                    print "Treinta.<br>";
                else
                {
                    $decNombre="Treinta y ";
                    print "$decNombre$uniNombre.<br>";
                }
                break;
            case 4:
                if($uNum==0)
                    print "Cuarenta.<br>";
                else
                {
                    $decNombre="Cuarenta y ";
                    print "$decNombre$uniNombre.<br>";
                }
                break;
            case 5:
                if($uNum==0)
                    print "Cincuenta.<br>";
                else
                {
                    $decNombre="Cincuenta y ";
                    print "$decNombre$uniNombre.<br>";
                }
                break;
            case 6:
                print "Sesenta.<br>";
                break;
        }
    }
?>