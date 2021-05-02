<?php
    require './persona.php';

    $personas=array();

    $personas=Persona::leerPersonas();
    Persona::guardarPersonas($personas);
?>