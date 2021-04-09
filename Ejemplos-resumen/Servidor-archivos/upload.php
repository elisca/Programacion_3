<?php
    #Definimos la ruta definitiva en la que guardar el archivo
    $destino="uploads/" . $_FILES["archivo"]["name"];

    #Movemos el archivo recibido a la ruta definitiva
    move_uploaded_file($_FILES["archivo"]["tmp_name"],$destino);

    echo var_dump($_POST) . "<br/>";
    var_dump($_FILES) . "<br/>";
    echo "Nombre del archivo: " . $_FILES["archivo"]["name"] . " Tamaño: " . $_FILES["archivo"]["size"] . " bytes.<br/>";
?>