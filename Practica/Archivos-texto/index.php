<?php
    require 'persona.php';

    $listaPersonas=array();

    $listaPersonas=Persona::leerPersonas();
    Persona::guardarPersonas($listaPersonas);
?>