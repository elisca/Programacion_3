<?php
    echo var_dump($_FILES) . "<br/>";
    #Definimos la ruta definitiva en la que guardar el archivo
    $destinoDatos="uploads/" . $_FILES["archivo"]["name"];
    $destinoFoto="uploads/" . $_FILES["foto"]["name"];

    #Movemos el archivo recibido a la ruta definitiva
    move_uploaded_file($_FILES["archivo"]["tmp_name"],$destinoDatos);

    if($_FILES["foto"]["size"]>1048576)
        echo "El icono de perfil tiene un tamaño superior a 256kb. Elija un archivo con menos peso.<br/>";
    else{
        move_uploaded_file($_FILES["foto"]["tmp_name"],$destinoFoto);
        echo "Icono cargado con exito.<br/>";
    }

    echo "Nombre del archivo: " . $_FILES["archivo"]["name"] . " Tamaño: " . $_FILES["archivo"]["size"] . " bytes.<br/>";
    echo "Usuario: " . $_POST["usuario"] . "<br/>";
    echo "Ruta: " . $destinoFoto . "<br/>";

    /*
    #Obtiene la extension de la imagen
    $extImagen=explode(".",$_FILES["imagen"]["name"]);
    $extImagen=$extImagen[count($extImagen)-1];
    $extImagen="." . $extImagen;

    #Setea la ruta y nombre del archivo destino
    $imagenVenta="ImagenesDeLaVenta/" . $auxPizzaPed->_tipo . "+" . $auxPizzaPed->_sabor . "+" . $dominioUsuario[0] . $extImagen;
    move_uploaded_file($_FILES["imagen"]["tmp_name"],$imagenVenta);        
    */
?>