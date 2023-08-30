<?php
    $op='/';
    $op1=1;
    $op2=1;

    $error=false;

    switch ($op) {
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
            if($op2!=0){
                $op1/=$op2;
            }
            else{
                $error=true;
                echo "No se admite división por cero.<br>";
            }
            break;
        default:
            $error=true;
            echo "Operador incorrecto.<br>";
            break;
    }

    if(!$error)
        echo "Resultado: " . $op1 . "<br>";
?>