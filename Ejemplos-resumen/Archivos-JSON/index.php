<?php
    require 'usuario.php';

    $arrayUsuarios=array();

    $usuario01=new Usuario("Usuario1","Clave1","mail1@email.com");
    $usuario02=new Usuario("Usuario2","Clave2","mail2@email.com");

    array_push($arrayUsuarios,$usuario01,$usuario02);

    $archivo=fopen("datos.dat","w");
    foreach($arrayUsuarios As $auxUsuario)
        fwrite($archivo,json_encode($auxUsuario) . "\r\n");
    fclose($archivo);

    $arrayUsuarios=array();#Vaciar array

    $archivo=fopen('datos.dat','r');
    while(!feof($archivo)){
        $auxObj=json_decode(fgets($archivo),true);
        if($auxObj!=null){
            $auxUsuario=new Usuario($auxObj['_nombre'],$auxObj['_clave'],$auxObj['_email']);
            array_push($arrayUsuarios,$auxUsuario);
        }
    }
    fclose($archivo);

    var_dump($arrayUsuarios);
?>