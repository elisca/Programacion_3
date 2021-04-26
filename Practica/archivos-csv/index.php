<?php
    require 'persona.php';

    $arrayUsuarios=array();

    /*
    $p0=new Persona('Adrian','Lisca','54');
    $p1=new Persona('Ezequiel','Lisca','29');

    array_push($arrayUsuarios,$p0,$p1);

    Persona::escribirCSV($arrayUsuarios,'./datos.csv');
    */
    $arrayUsuarios=Persona::leerCSV('./datos.csv');

    foreach($arrayUsuarios As $p){
        echo var_dump($p) . "<br/>";
    }
?>