<?php
	/*RESUMEN:
	-array_pop() elimina el ultimo elemento del array, al agregar otro toma el mismo id del elemento eliminado.
	-unset() elimina el elemento del array especificado, al agregar otro toma un id nuevo.
	-array_push() agrega un elemento al array.
	-array_splice() elimina una porción del array y trae elementos siguientes con ids libres existentes.*/

	$aNums=array(10,20,30,40,50,60);

	echo "UNSET:<br>";

	#Muestra array completo
	echo "Muestra array completo:<br>";
	var_dump($aNums);
	echo "<br/>";
	echo "Cant. elementos: " . count($aNums) . "<br/>";

	#Elimina elemento de valor 30
	echo "Elimina elemento de valor 30:<br>";
	unset($aNums[2]);

	#Muestra array con elemento eliminado
	echo "Muestra array con elemento eliminado:<br>";
	var_dump($aNums);
	echo "<br/>";
	echo "Cant. elementos: " . count($aNums) . "<br/>";

	echo "PUSH:<br>";

	#Agrego un elemento
	echo "Agrego un elemento:<br>";
	array_push($aNums,70);

	#Muestra array con elemento eliminado y otro agregado
	echo "Muestra array con elemento eliminado y otro agregado:<br>";
	var_dump($aNums);
	echo "<br/>";
	echo "Cant. elementos: " . count($aNums) . "<br/>";

	echo "POP:<br>";

	#Elimina ultimo elemento del array
	echo "Elimina ultimo elemento del array:<br>";
	array_pop($aNums);

	#Muestra array nuevamente
	echo "Muestra array nuevamente:<br>";
	var_dump($aNums);
	echo "<br/>";
	echo "Cant. elementos: " . count($aNums) . "<br/>";

	#Agrego un elemento
	echo "Agrego un elemento:<br>";
	array_push($aNums,80);

	#Muestra array
	echo "Muestra array:<br>";
	var_dump($aNums);
	echo "<br/>";
	echo "Cant. elementos: " . count($aNums) . "<br/>";

	echo "SPLICE:<br>";

	#Elimino el segundo elemento
	echo "Elimino el segundo elemento:<br>";
	array_splice($aNums,1,1);

	#Muestra array
	echo "Muestra array:<br>";
	var_dump($aNums);
	echo "<br/>";
	echo "Cant. elementos: " . count($aNums) . "<br/>";

	#Elimino el último elemento
	echo "Elimino el último elemento:<br>";
	array_splice($aNums,-1,1);

	#Muestra array
	echo "Muestra array:<br>";
	var_dump($aNums);
	echo "<br/>";
	echo "Cant. elementos: " . count($aNums) . "<br/>";

	#Elimino desde segundo elemento
	echo "Elimino desde segundo elemento:<br>";
	array_splice($aNums,1);

	#Muestra array
	echo "Muestra array:<br>";
	var_dump($aNums);
	echo "<br/>";
	echo "Cant. elementos: " . count($aNums) . "<br/>";
?>