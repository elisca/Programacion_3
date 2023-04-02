<?php
    $operador='+';
    $op1=1;
    $op2=2;
    $estError=false;

    switch($operador)
    {
        case '+':
            $op1+=$op2;
            break;
        case '-':
            $op1-=$op2;
            break;
        case '*':
            $op1*=$op2;
            break;
        case '/':
            if($op2!=0)
                $op1/=$op2;
            else
            {
                $estError=true;
                print "ERROR: No se admite division por cero.";
            }
            break;
        default:
            $estError=true;
            print "ERROR: El operador ingresado no es válido.";
            break;
    }

    if(!$estError)
        print "RESULTADO: $op1";
    echo "<br>";
?>