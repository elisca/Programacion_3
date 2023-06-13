<?php
    class Helado
    {
        public $_id;
        public $_sabor;
        public $_precio;
        public $_tipo;
        public $_vaso;
        public $_stock;

        public static $_heladosStock=[];

        public function __construct($id,$sabor,$tipo,$precio,$vaso,$stock)
        {
            if(isset($sabor) && isset($tipo) && ($tipo=="Agua" || $tipo=="Crema") && isset($precio) && $precio>0 && ($vaso=="Cucurucho" || $vaso=="Plastico") && isset($stock) && $stock>0)
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
                $this->_vaso=$vaso;
                $this->_stock=$stock;
                #echo "Helado creada.<br>";
            }
            else
            {
                echo "Error al recibir datos para cargar stock de Helados.<br>";
            }
        }

        public function altaStock()
        {
            $auxId=$this->buscarHelado();

            if($auxId>=0)
            {
                Helado::$_heladosStock[$auxId]->_precio=$this->_precio;
                Helado::$_heladosStock[$auxId]->_stock+=$this->_stock;
                $this->guardarJSON();
                #echo "Actualización pizza exitosa.<br>";
            }
            else
            {
                array_push(Helado::$_heladosStock,$this);
                #echo "Alta pizza exitosa.<br>";
            }
            $this->guardarJSON();
        }

        public function descontarStock($devolverStock=false)
        {
            $auxId=$this->buscarHelado();

            if($auxId>=0)
            {
                if(!$devolverStock)
                {
                    Helado::$_heladosStock[$auxId]->_stock-=$this->_stock;
                }
                else
                {
                    Helado::$_heladosStock[$auxId]->_stock+=$this->_stock;
                }
                $this->guardarJSON();
                #echo "Actualización pizza exitosa.<br>";
            }
            else
            {
                echo "Pizza inexistente o cantidad sin disponibilidad.<br>";
            }
            $this->guardarJSON();
        }

        public function buscarHelado()
        {
            $retorno=-1;

            foreach (Helado::$_heladosStock as $k => $v)
            {
                if(!strcmp($v->_sabor,$this->_sabor) && !strcmp($v->_tipo,$this->_tipo))
                {
                    $retorno=$k;
                    #echo "Helado encontrada.<br>";
                    break;
                }
            }

            #echo "Helado no encontrada.<br>";
            return $retorno;
        }

        public function comprobarStock()
        {
            $stockSuficiente=false;

            $auxId=$this->buscarHelado();

            if($auxId<0)
            {
                #echo "No existe sabor o tipo.<br>";
            }
            else
            {
                if($this->_stock<=Helado::$_heladosStock[$auxId]->_stock)
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
            $archivo=fopen("Helado.json","w");
            foreach(Helado::$_heladosStock As $auxHelado)
            {
                #var_dump($auxPizza);
                fwrite($archivo,json_encode($auxHelado) . "\r\n");
            }
            fclose($archivo);
            #echo "Escritura archivo exitosa.<br>";
        }

        public static function leerJSON()
        {
            $archivo=fopen('Helado.json','r');
            if($archivo)
            {
                while(!feof($archivo)){
                    $auxObj=json_decode(fgets($archivo),true);
                    if($auxObj!=null){
                        $auxHelado=new Helado($auxObj['_id'],$auxObj['_sabor'],$auxObj['_tipo'],$auxObj['_precio'],$auxObj['_vaso'],$auxObj['_stock']);
                        #var_dump($auxPizza);
                        $auxHelado->altaStock();
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