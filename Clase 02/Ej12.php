<?php
    $palabra="HOLA";
    $palInvertida=[];

    for($i=strlen($palabra)-1;$i>=0;$i--)
        array_push($palInvertida,$palabra[$i]);
    
    $palInvertida=implode($palInvertida);

    print "Palabra: $palabra Palabra invertida: $palInvertida<br>";
?>