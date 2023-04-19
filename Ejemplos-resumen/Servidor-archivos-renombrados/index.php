<?php
    $metodoPeticion=$_SERVER['REQUEST_METHOD'];

    echo var_dump($_FILES) . "<br/>";

    if($metodoPeticion=='POST'){
        $nuevoNombre='datos.csv';
        $rutaArchivos="./uploads/" . $nuevoNombre;
        move_uploaded_file($_FILES['archivoDatos']['tmp_name'],$rutaArchivos); 
    }
?>