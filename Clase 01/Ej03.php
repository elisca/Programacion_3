<?php
    $a=1;
    $b=2;
    $c=3;

    #Si algún valor es igual a otro ya no será posible un valor medio.
    if($a==$b || $a==$c || $b==$c)
        print "No hay valor del medio.<br>";
    #Si todos los valores son distintos, se busca cual es el valor medio.
    else
        #En caso que el valor mayor sea A...
        if($a>$b && $a>$c)
            #De los dos restantes, B es el medio.
            if($b>$c)
                print "B=$b";
            #De los dos restantes, C es el medio.
            else
                print "C=$c";
        #En caso que el valor mayor sea B...
        elseif($b>$a && $b>$c)
            #De los dos restantes, A es el medio.
            if($a>$c)
                print "A=$a";
            #De los dos restantes, C es el medio.
            else
                print "C=$c";
        #En caso que el valor mayor no sean A ni B, por descarte es C...
        else
            #De los dos restantes, B es el medio.
            if($b>$a)
                print "B=$b";
            #De los dos restantes, A es el medio.
            else
                print "A=$a";
    echo "<br>";
?>