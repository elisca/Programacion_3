<?php
	$rutaArchivo="./datos.csv";

	echo "-------------------------------------------<br/>";
	#Lectura completa línea por línea
	$archivo=fopen($rutaArchivo,"r");
	while(!feof($archivo))
		echo $datos=fgets($archivo) . "<br/>"; #Leemos una línea CSV en bruto
	fclose($archivo);

	echo "-------------------------------------------<br/>";
	#Lectura completa por bytes
	$archivo=fopen($rutaArchivo,"r");
	$tamArchivo=filesize($rutaArchivo);
	
	echo fread($archivo,$tamArchivo) . "<br/>";
	fclose($archivo);

	echo "-------------------------------------------<br/>";
	#Lectura en bloques de 32 bytes
	$archivo=fopen($rutaArchivo,"r");
	
	while(!feof($archivo))
		echo fread($archivo,32) . "<br/>";
	fclose($archivo);

	echo "-------------------------------------------<br/>";
	#Lectura de líneas de datos CSV
	$archivo=fopen($rutaArchivo,"r");

	while($datos=fgetcsv($archivo,0,",",'"')){
		echo var_dump($datos) . "<br/>"; #Vemos contenido leído en bruto de la línea
		echo $datos[3] . "<br/>"; #Sólo separamos el cuarto campo de la línea
	}
	fclose($archivo);

	echo "-------------------------------------------<br/>";
	#Escritura de líneas de datos desde arrays a CSV
	$arrayUsuarios=array();
	$uEzequiel=array('21','Ezequiel','Lisca','ezequiel.lisca@live.com');
	$uAriel=array('22','Ariel','Lisca','ariel.lisca@gmail.com');
	$uAdrian=array('23','Adrian','Lisca','adrian.lisca@hotmail.com');
	array_push($arrayUsuarios,$uEzequiel);	
	array_push($arrayUsuarios,$uAriel);	
	array_push($arrayUsuarios,$uAdrian);

	$archivo=fopen($rutaArchivo,"a");

	foreach($arrayUsuarios As $usuario) #Recorre el array que contiene los usuarios con sus datos
		fputcsv($archivo,$usuario); #Escribe una línea de datos en base a un elemento del array
	fclose($archivo);
?>