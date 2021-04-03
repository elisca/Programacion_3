<?php
	/*RESUMEN:
	-array_pop() elimina el ultimo elemento del array, al agregar otro toma el mismo id del elemento eliminado.
	-unset() elimina el elemento del array especificado, al agregar otro toma un id nuevo.
	-array_push() agrega un elemento al array.*/

	$aNums=array(10,20,30,40,50,60);

	#Muestra array completo
	var_dump($aNums);
	echo "<br/>";
	echo "Cant. elementos: " . count($aNums) . "<br/>";

	#Elimina elemento de valor 30
	unset($aNums[2]);

	#Muestra array con elemento eliminado
	var_dump($aNums);
	echo "<br/>";
	echo "Cant. elementos: " . count($aNums) . "<br/>";

	#Agrego un elemento
	array_push($aNums,60);

	#Muestra array con elemento eliminado y otro agregado
	var_dump($aNums);
	echo "<br/>";
	echo "Cant. elementos: " . count($aNums) . "<br/>";

	#Elimina ultimo elemento del array
	array_pop($aNums);

	#Muestra array nuevamente
	var_dump($aNums);
	echo "<br/>";
	echo "Cant. elementos: " . count($aNums) . "<br/>";

	#Agrego un elemento
	array_push($aNums,60);

	#Muestra array
	var_dump($aNums);
	echo "<br/>";
	echo "Cant. elementos: " . count($aNums) . "<br/>";
?>