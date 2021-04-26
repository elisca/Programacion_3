<?php
    require 'persona.php';

    $arrayUsuarios=array();

    $p0=new Persona('Adrian','Lisca','54');
    $p1=new Persona('Ezequiel','Lisca','29');

    /*
    array_push($arrayUsuarios,$p0,$p1);

    Persona::escribirJSON($arrayUsuarios,'./datos.json');
    */
    $arrayUsuarios=Persona::leerJSON('./datos.json');

    foreach($arrayUsuarios As $p){
        echo var_dump($p) . "<br/>";
    }
?>