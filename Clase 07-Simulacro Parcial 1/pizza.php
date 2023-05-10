<?php
    class Pizza
    {
        public $_id;
        public $_sabor;
        public $_precio;
        public $_tipo;
        public $_cantidad;

        public static $_pizzasStock=[];

        public function __construct($id,$sabor,$tipo,$precio,$cantidad)
        {
            if(isset($sabor) && isset($tipo) && ($tipo=="molde" || $tipo=="piedra") && isset($precio) && $precio>0 && isset($cantidad) && $cantidad>0)
            {
                if($id<0)
                {
                    $this->_id=rand(1,1000);
                }
                else
                {
                    $this->_id=$id;
                }
                $this->_sabor=$sabor;
                $this->_precio=$precio;
                $this->_tipo=$tipo;
                $this->_cantidad=$cantidad;
                #echo "Pizza creada.<br>";
            }
            else
            {
                echo "Error al recibir datos para cargar stock de pizzas.<br>";
            }
        }

        public function altaStock()
        {
            $auxId=$this->buscarPizza();

            if($auxId>=0)
            {
                Pizza::$_pizzasStock[$auxId]->_precio=$this->_precio;
                Pizza::$_pizzasStock[$auxId]->_cantidad+=$this->_cantidad;
                $this->guardarJSON();
                #echo "Actualización pizza exitosa.<br>";
            }
            else
            {
                array_push(Pizza::$_pizzasStock,$this);
                #echo "Alta pizza exitosa.<br>";
            }
            $this->guardarJSON();
        }

        public function descontarStock()
        {
            $auxId=$this->buscarPizza();

            if($auxId>=0)
            {
                Pizza::$_pizzasStock[$auxId]->_cantidad-=$this->_cantidad;
                $this->guardarJSON();
                #echo "Actualización pizza exitosa.<br>";
            }
            else
            {
                echo "Pizza inexistente o cantidad sin disponibilidad.<br>";
            }
            $this->guardarJSON();
        }

        public function buscarPizza()
        {
            $retorno=-1;

            foreach (Pizza::$_pizzasStock as $k => $v)
            {
                if(!strcmp($v->_sabor,$this->_sabor) && !strcmp($v->_tipo,$this->_tipo))
                {
                    $retorno=$k;
                    #echo "Pizza encontrada.<br>";
                    break;
                }
            }

            #echo "Pizza no encontrada.<br>";
            return $retorno;
        }

        public function comprobarStock()
        {
            $stockSuficiente=false;

            $auxId=$this->buscarPizza();

            if($auxId<0)
            {
                #echo "No existe sabor o tipo.<br>";
            }
            else
            {
                if($this->_cantidad<=Pizza::$_pizzasStock[$auxId]->_cantidad)
                {
                    $stockSuficiente=true;
                    #echo "Si, hay stock.<br>";
                }
                else
                {
                    #echo "No hay stock.<br>";
                }
            }
            
            return $stockSuficiente;
        }

        private function guardarJSON()
        {
            $archivo=fopen("Pizza.json","w");
            foreach(Pizza::$_pizzasStock As $auxPizza)
            {
                #var_dump($auxPizza);
                fwrite($archivo,json_encode($auxPizza) . "\r\n");
            }
            fclose($archivo);
            #echo "Escritura archivo exitosa.<br>";
        }

        public static function leerJSON()
        {
            $archivo=fopen('Pizza.json','r');
            if($archivo)
            {
                while(!feof($archivo)){
                    $auxObj=json_decode(fgets($archivo),true);
                    if($auxObj!=null){
                        $auxPizza=new Pizza($auxObj['_id'],$auxObj['_sabor'],$auxObj['_tipo'],$auxObj['_precio'],$auxObj['_cantidad']);
                        #var_dump($auxPizza);
                        $auxPizza->altaStock();
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