<?php
    $a=1;
    $b=2;
    $c=3;

    if(($a>$b && $a<$c) || ($a>$c && $a<$b)){
        echo "El número intermedio es 'A'.<br>";
    }
    else if(($b>$a && $b<$c) || ($b>$c && $b<$a)){
        echo "El número intermedio es 'B'.<br>";
    }
    else if(($c>$a && $c<$b) || ($c>$b && $c<$a)){
        echo "El número intermedio es 'C'.<br>";
    }
    else{
        echo "No existe número intermedio.<br>";
    }
?>