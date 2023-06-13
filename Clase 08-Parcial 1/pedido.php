<?php
    class Pedido
    {
        public $_venta;
        public $_usuario;
        public $_id;
        public $_fecha;
        public $_numero;
        public static $contId=0;

        public static $_pedidos=[];

        public function __construct($venta,$usuario,$id=-1,$fecha='9/5/2023',$numero=-1)
        {
            if($id>=0)
            {
                Pedido::$contId=$id;
                $this->_id=$id;                
            }
            else
            {
                Pedido::$contId++;
                $this->_id=Pedido::$contId;
            }
            
            $this->_fecha=$fecha;
            
            if($numero>=0)
            {
                $this->_numero=$numero;
            }
            else
            {
                $this->_numero=rand(1,1000);
            }

            if(isset($usuario))
            {
                $this->_usuario=$usuario;
            }
            else
            {
                echo "Error al intentar cargar pedido, no está asociado a un usuario.<br>";
            }

            if(isset($venta))
            {
                $this->_venta=$venta;
            }
            else
            {
                echo "Error al intentar cargar pedido, no está asociado a una venta.<br>";
            }
        }

        public function altaPedido()
        {
            array_push(Pedido::$_pedidos,$this);
            #echo "Alta pedido exitosa.<br>";
            $this->guardarPedidoJSON();
        }

        public static function guardarPedidoJSON()
        {
            $archivo=fopen("Pedidos.json","w");
            foreach(Pedido::$_pedidos As $auxPedido)
            {
                #var_dump($auxPedido);
                fwrite($archivo,json_encode($auxPedido) . "\r\n");
            }
            fclose($archivo);
            #echo "Escritura archivo exitosa.<br>";
        }

        public static function leerPedidosJSON()
        {
            $archivo=fopen('Pedidos.json','r');
            if($archivo)
            {
                while(!feof($archivo)){
                    $auxObj=json_decode(fgets($archivo),true);
                    if($auxObj!=null){
                        $auxPedido=new Pedido($auxObj['_venta'],$auxObj['_usuario'],$auxObj['_id'],$auxObj['_fecha'],$auxObj['_numero']);
                        #var_dump($auxPedido);
                        array_push(Pedido::$_pedidos,$auxPedido);
                    }
                }
                fclose($archivo);
            }
            else
            {
                echo "Error al intentar leer archivo JSON.<br>";
            }
        }

        public static function guardarImagen($auxUsuario,$auxHeladoPed)
        {
            #Separa el usuario del dominio en el email
            $dominioUsuario=explode("@",$auxUsuario);

            #Obtiene la extension de la imagen
            $extImagen=explode(".",$_FILES["imagen"]["name"]);
            $extImagen=$extImagen[count($extImagen)-1];
            $extImagen="." . $extImagen;

            #Setea la ruta y nombre del archivo destino
            $imagenVenta="ImagenesDeHelados/2023/" . $auxHeladoPed->_sabor . "+" . $auxHeladoPed->_tipo . "+" . $dominioUsuario[0] . $extImagen;
            move_uploaded_file($_FILES["imagen"]["tmp_name"],$imagenVenta);        
        }

        public static function contarCantidadVendida($fecha)
        {
            $cantVendidas=0;

            if(!isset($fecha) || $fecha=="")
            {
                $fecha=date(date('d') - 1 . '/n/Y');
            }

            foreach (Pedido::$_pedidos as $vAuxPedido)
            {
                $vAuxPedido=(array)$vAuxPedido;
                if($fecha==$vAuxPedido['_fecha'])
                {
                    $cantVendidas+=$vAuxPedido["_venta"]["_stock"];
                }
            }
    
            return $cantVendidas;
        }

        public static function listarVentasPorUsuario($auxUsuario)
        {
            echo "Pedidos realizados por usuario: " . $auxUsuario . "<br>";

            if(isset($auxUsuario))
            {
                foreach (Pedido::$_pedidos as $kPedido => $vPedido)
                {
                    $vPedido=(array)$vPedido;
                    if(!strcmp($vPedido["_usuario"],$auxUsuario))
                    {
                        echo var_dump($vPedido) . "<br>";
                    }
                }
            }
            else
            {
                echo "Error al intentar listar ventas por usuario, dato incorrecto o vacío en usuario.<br>";
            }
        }

        public static function listarVentasPorSabor($auxSabor)
        {
            echo "Pedidos realizados por sabor: " . $auxSabor . "<br>";

            if(isset($auxSabor))
            {
                foreach (Pedido::$_pedidos as $kPedido => $vPedido)
                {
                    $vPedido=(array)$vPedido;
                    if(!strcmp($vPedido["_venta"]["_sabor"],$auxSabor))
                    {
                        echo var_dump($vPedido) . "<br>";
                    }
                }
            }
            else
            {
                echo "Error al intentar listar ventas por sabor, dato incorrecto o vacío en sabor.<br>";
               }
        }        

        public static function listarVentasPorVaso($auxVaso)
        {
            echo "Pedidos realizados por vaso: " . $auxVaso . "<br>";

            if(isset($auxVaso))
            {
                foreach (Pedido::$_pedidos as $kPedido => $vPedido)
                {
                    $vPedido=(array)$vPedido;
                    if(!strcmp($vPedido["_venta"]["_vaso"],$auxVaso))
                    {
                        echo var_dump($vPedido) . "<br>";
                    }
                }
            }
            else
            {
                echo "Error al intentar listar ventas por vaso, dato incorrecto o vacío en vaso.<br>";
               }
        }

        public static function listarVentasPorFechas($desdeFecha,$hastaFecha)
        {
            echo "Pedidos realizados desde " . $desdeFecha . " hasta " . $hastaFecha . ":" . "<br>";

            if(isset($desdeFecha) && isset($hastaFecha))
            {
                foreach (Pedido::$_pedidos as $kPedido => $vPedido)
                {
                    $vPedido=(array)$vPedido;
                }
            }
            else
            {
                echo "Error al intentar listar ventas por sabor, dato incorrecto o vacío en sabor.<br>";
               }
        }

        public static function buscarPedido($auxId)
        {
            $retorno=-1;

            foreach (Pedido::$_pedidos as $auxPedKey => $auxPed) {
                if($auxId==$auxPed->_id)
                {
                    $retorno=$auxPedKey;
                    break;
                }
            }

            return $retorno;
        }

        public static function buscarPedidoPorId($auxId)
        {
            $retorno=-1;
            
            foreach (Pedido::$_pedidos as $auxPedKey => $auxPed) {
                if($auxId==$auxPed->_numero)
                {
                    $retorno=$auxId;
                    break;
                }
            }

            return $retorno;
        }
    }
?>