<?php
    echo "Recuperatorio(15): " . invertirPalabra("Recuperatorio",15) . "<br>";
    echo "Recuperatorio(10): " . invertirPalabra("Recuperatorio",10) . "<br>";
    echo "Otro(15): " . invertirPalabra("Otro",15) . "<br>";

    function invertirPalabra($palabra,$max)
    {
        $retorno=null;

        if(strlen($palabra)>$max)
            print "La longitud de la palabra es mayor al máximo admitido.<br>";
        
        if(!strcmp($palabra,"Recuperatorio") || !strcmp($palabra,"Parcial") || !strcmp($palabra,"Programacion"))
            $retorno=1;
        else
            $retorno=0;
        
        return $retorno;
    }
?>