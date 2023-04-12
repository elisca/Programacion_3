<?php
    require 'usuario.php';

    $metPeticion=$_SERVER['REQUEST_METHOD'];

    if($metPeticion=='POST')
    {
        Usuario::leerUsuarios();
        Usuario::altaUsuario($_POST['nombre'],$_POST['clave'],$_POST['mail']);
        Usuario::grabarUsuarios();
        Usuario::mostrarUsuarios();
    }
    else
        echo "ERROR: Se esperaba petición POST.<br>";
?>