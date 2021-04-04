<?php
    require "./usuario.php";

    $mPeticion=$_SERVER['REQUEST_METHOD'];

    if($mPeticion=="GET"){
        Usuario::LeerUsuariosCSV("./registro.csv");
        Usuario::GenerarLista();
    }
    else
        echo "Se esperaba una petición tipo \"GET\".<br/>";
?>