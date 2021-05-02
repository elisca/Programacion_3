<?php
    require 'producto.php';
    require 'venta.php';
    require 'usuario.php';

    $metodoPet=$_SERVER['REQUEST_METHOD'];

    $arrayProductos=array();
    $arrayProductos=Producto::leerJSON();

    $arrayUsuarios=array();
    $arrayUsuarios=Usuario::leerJSON();

    $arrayVentas=array();
    $arrayVentas=Venta::leerJSON();

    if($metodoPet=='POST'){
        $tmpCodBarraProd=$_POST['codBarraProd'];
        $tmpCodUsuario=$_POST['codUsuario'];
        $tmpCantidad=$_POST['cantidad'];

        if(strlen($tmpCodBarraProd)==6 && strlen($tmpCodUsuario)>0 && strlen($tmpCantidad)>0){
            $tmpVenta=new Venta($tmpCodBarraProd,
            $tmpCodUsuario,
            $tmpCantidad);
     
            $tmpProducto=new Producto($tmpCodBarraProd,null,null,null,null);
            $tmpUsuario=new Usuario($tmpCodUsuario,null,null);

            //Producto existente
            $indice=Producto::ConfirmarProductoExistente($arrayProductos,$tmpProducto);
            if($indice>=0){
                //Producto con stock suficiente
                if($arrayProductos[$indice]->_stock-$tmpCantidad>=0){
                    echo "Producto existente con stock suficiente.<br/>";
                    //Usuario existente
                    if(Usuario::ComprobarUsuarioExistente($arrayUsuarios,$tmpUsuario)){
                        echo "Usuario existente.<br/>";
                        //Realizar venta
                        $tmpVenta=new Venta(rand(1,10000),$tmpCodUsuario,$tmpCantidad);
                        $arrayProductos[$indice]->_stock=$arrayProductos[$indice]->_stock-$tmpCantidad;
                        array_push($arrayVentas,$tmpVenta);
                        Venta::escribirJSON($arrayVentas);
                        Producto::escribirJSON($arrayProductos);
                        echo "Venta realizada.<br/>";
                    }
                    //Usuario inexistente
                    else{
                        echo "Usuario inexistente.<br/>";
                    }
                }
                //Producto sin stock o con stock insuficiente
                else{
                    echo "Producto existente en faltante o con stock insuficiente.<br/>";
                }
            }
            //Producto inexistente
            else{
                echo "Producto inexistente.<br/>";
            }
        }
        else{
            echo "No se pudo vender producto.<br/>";
        }
    }
    else{
        echo "Se esperaba petición POST.<br/>";
    }
?>