<?php
    class Cupon
    {
        public $_id;
        public $_devolucion_id;
        public $_porcentajeDescuento;
        public $_estado;
        public $_importe;
        public $_imagen;

        public static $_cupones=[];

        public function __construct($id,$idDevolucion,$porcentajeDescuento=10,$estado,$importe=0,$imagen)
        {
            if(isset($id) && isset($idDevolucion) && isset($porcentajeDescuento) && isset($estado) && isset($importe))
            {
                if($id<0)
                {
                    echo "ERROR, id de pedido inexistente.<br>";
                }
                else
                {
                    $this->_id=$id;
                }

                if($idDevolucion<0)
                {
                    $this->_id=rand(1,1000);
                }
                else
                {
                    $this->_id=$id;
                }

                if($porcentajeDescuento!=10)
                {
                    echo "El porcentaje de descuento aplicable es únicamente del 10%.<br>";
                    $this->_porcentajeDescuento=10;
                }

                if($estado=="usado" || $estado=="no usado")
                {
                    $this->_estado=$estado;
                }
                else
                {
                    echo "ERROR, el estado de cupón ingresado es incorrecto.<br>";
                }

                if($importe<=0)
                {
                    echo "ERROR al ingresar el importe del pedido.<br>";
                }
                else
                {
                    $importe*=($porcentajeDescuento/100);
                    $this->_importe=$importe;
                }
            }
            else
            {
                echo "Error al recibir datos para cargar cupón de descuento.<br>";
            }
        }

        public function altaCupon()
        {
            array_push(Cupon::$_cupones,$this);
            Cupon::guardarJSON();
        }

        /*
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
        */

        private static function guardarJSON()
        {
            $archivo=fopen("Cupon.json","w");
            foreach(Cupon::$_cupones As $auxCupon)
            {
                fwrite($archivo,json_encode($auxCupon) . "\r\n");
            }
            fclose($archivo);
            #echo "Escritura archivo exitosa.<br>";
        }

        public static function leerJSON()
        {
            $archivo=fopen('Cupon.json','r');
            if($archivo)
            {
                while(!feof($archivo)){
                    $auxObj=json_decode(fgets($archivo),true);
                    if($auxObj!=null){
                        $auxCupon=new Cupon($auxObj['_id'],$auxObj['_devolucion_id'],$auxObj['_porcentajeDescuento'],$auxObj['_estado;'],$auxObj['_importe'],$auxObj['_imagen']);
                        #var_dump($auxPizza);
                        $auxCupon->altaCupon();
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