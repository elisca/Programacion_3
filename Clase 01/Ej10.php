<?php
    $lapicera1=["color"=>"Azul", "marca"=>"BIC", "trazo"=>"Estandar", "precio"=>100];
    $lapicera2=["color"=>"Rojo", "marca"=>"BIC", "trazo"=>"Fino", "precio"=>120];
    $lapicera3=["color"=>"Verde", "marca"=>"Staedtler", "trazo"=>"Grueso", "precio"=>180];

    #Array asociativo
    $arAsocLapic=["lapic1"=>$lapicera1,"lapic2"=>$lapicera2,"lapic3"=>$lapicera3];

    #Array indexado
    $arIndLapic=[$lapicera1,$lapicera2,$lapicera3];

    #Mostrar array asociativo
    print "ARRAY ASOCIATIVO:<br>";
    foreach ($arAsocLapic as $key => $value)
    {
        print "Color: $value[color] Marca: $value[marca] Trazo: $value[trazo] Precio:$ $value[precio]<br>";
    }

    #Mostrar Array indexado
    print "ARRAY INDEXADO:<br>";
    foreach ($arIndLapic as $clave => $vLapic)
    {
        print "Color: $vLapic[color] Marca: $vLapic[marca] Trazo: $vLapic[trazo] Precio: $vLapic[precio]<br>";
    }
?>