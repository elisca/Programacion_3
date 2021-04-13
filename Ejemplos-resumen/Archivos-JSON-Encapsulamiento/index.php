<?php
    require "persona.php";

    $persona=new Persona("","","",0);
    $persona->ToString();

    $persona->_nombre="Ezequiel";
    $persona->_apellido="Lisca";
    $persona->_dni="36.763.479";
    $persona->_edad=29;
    $persona->ToString();

    echo "OBJETO CODIFICADO(JSON):<br/>";
    $personaJSON=json_encode($persona);
    echo $personaJSON . "<br/>";
?>