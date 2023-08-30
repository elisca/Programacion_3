<?php
    class Test{
        public $atr1=1;
        public $atr2=2;

        public function __construct(){}
    }

    $obj1=new Test();

    foreach ($obj1 as $key => $value)
        echo "Clave: " . $key . " Valor: " . $value . "<br>";
?>