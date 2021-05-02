<?php
    require 'producto.php';

    $metodoPet=$_SERVER['REQUEST_METHOD'];
    $arrayProductos=array();
    $arrayProductos=Producto::leerJSON();

    if($metodoPet=='POST'){
        $tmpCodBarra=$_POST['codBarra'];
        $tmpNombre=$_POST['nombre'];
        $tmpTipo=$_POST['tipo'];
        $tmpStock=$_POST['stock'];
        $tmpPrecio=$_POST['precio'];

        if(strlen($tmpCodBarra)==6 && strlen($tmpNombre)>0 && strlen($tmpTipo)>0 && strlen($tmpStock)>0 && strlen($tmpPrecio)>0){
            $tmpProducto=new Producto($tmpCodBarra,
            $tmpNombre,
            $tmpTipo,
            $tmpStock,
            $tmpPrecio);
     
            //Producto existente
            $indice=Producto::ConfirmarProductoExistente($arrayProductos,$tmpProducto);
            if($indice>=0){
                $arrayProductos[$indice]->_stock+=$tmpProducto->_stock;
                echo "Producto actualizado.<br/>";
            }
            //Producto inexistente
            else{
                array_push($arrayProductos,$tmpProducto);
                echo "Producto ingresado.<br/>";
            }
            Producto::escribirJSON($arrayProductos);
        }
        else{
            echo "No se pudo registrar producto.<br/>";
        }
    }
    else{
        echo "Se esperaba petición POST.<br/>";
    }
?>