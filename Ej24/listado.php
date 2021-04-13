<?php
    require 'usuario.php';

    $rutaArchivo='usuarios.json';
    $arrayUsuarios=Usuario::LeerUsuarios();

    echo "<ul>";

    foreach($arrayUsuarios As $v){
        echo "<li>" . $v->_nombre . "," . $v->_clave . "," . $v->_email . "," . $v->_fechaReg . "," . $v->_nombreFoto . "</li>";
    }

    echo "</ul>";
?>