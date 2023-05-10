<?php
    class Pedido
    {
        public $_id;
        public $_fecha;
        public $_numero;
        public static $contId=0;

        public static $_pedidos=[];

        public function __construct($id=-1,$fecha='9/5/2023',$numero=-1)
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
            
            $this->_fecha=date('d/M/Y');
            
            if($numero>=0)
            {
                $this->_numero=$numero;
            }
            else
            {
                $this->_numero=rand(1,1000);
            }
        }

        public function altaPedido()
        {
            array_push(Pedido::$_pedidos,$this);
            #echo "Alta pedido exitosa.<br>";
            $this->guardarPedidoJSON();
        }

        public function guardarPedidoJSON()
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

        public function leerPedidosJSON()
        {
            $archivo=fopen('Pedidos.json','r');
            if($archivo)
            {
                while(!feof($archivo)){
                    $auxObj=json_decode(fgets($archivo),true);
                    if($auxObj!=null){
                        $auxPedido=new Pedido($auxObj['_id'],$auxObj['_sabor'],$auxObj['_tipo'],$auxObj['_precio'],$auxObj['_cantidad']);
                        #var_dump($auxPedido);
                        $auxPedido->altaPedido();
                    }
                }
                fclose($archivo);
            }
            else
            {
                echo "Error al intentar leer archivo JSON.<br>";
            }
        }
    }
?>