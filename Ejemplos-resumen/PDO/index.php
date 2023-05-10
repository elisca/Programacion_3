<?php
    #Instancia PDO---------------------------------------------
    $pdo=new PDO('mysql:host=localhost;dbname=prueba','root','');

    #$sentencia1=$pdo->prepare('INSERT INTO usuarios (id,nombre,apellido,dni) VALUES ("3","Nombre3","Apellido3","234567890")');
    $sentencia2=$pdo->prepare('SELECT * FROM usuarios');

    #$sentencia1->execute();
    $sentencia2->execute();

    #INSERTAR DATOS---------------------------------------------
    #Ejemplo datos a insertar
    $usuario=array("id"=>5,"nombre"=>"Nombre5","apellido"=>"Apellido5","dni"=>"456789012");

    insertarDatosPDO("usuarios",$usuario);
    function insertarDatosPDO($nombreTabla,$datosFila)
    {
        $sentencia3="INSERT INTO " . $nombreTabla . " (";
        
        foreach ($datosFila as $key10=>$value10) {
            $sentencia3=$sentencia3 . $key10 . ",";
        }
        $sentencia3=substr($sentencia3,0,-1);
        $sentencia3=$sentencia3 . ") VALUES (\"";
    
        foreach ($datosFila as $value11) {
            $sentencia3=$sentencia3 . $value11 . "\",\"";
        }
        $sentencia3=substr($sentencia3,0,-2);
        $sentencia3=$sentencia3 . ")";
        echo $sentencia3;
    }

    /*FETCH TERMINADO---------------------------------------------
    -PDO::FETCH_ASSOC: ARRAY ASOCIATIVO
    -PDO::FETCH_NUM: ARRAY INDEXADO
    -PDO::FETCH_BOTH: AMBAS INDEXACIONES*/
    while($datos = $sentencia2->fetch(PDO::FETCH_ASSOC))
    {
        foreach ($datos as $key12 => $value12)
            echo $datos[$key12] . " ";
        echo "<br>";
    }

    /*FETCHALL TERMINADO---------------------------------------------
    -PDO::FETCH_ASSOC: ARRAY ASOCIATIVO
    -PDO::FETCH_NUM: ARRAY INDEXADO
    -PDO::FETCH_BOTH: AMBAS INDEXACIONES*/
    while($datos = $sentencia1->fetchAll(PDO::FETCH_ASSOC))
    {
        foreach ($datos as $key1 => $value1)
        {
            foreach ($datos[$key1] as $key2 => $value2)
                echo $datos[$key1][$key2] . " ";
            echo "<br>";
        }
    }
?>