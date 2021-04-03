<?php
	echo "DATO GENÉRICO DE PETICIÓN:<br/>";
	echo "MÉTODO: " . $_SERVER['REQUEST_METHOD'] . "<br/>";
	foreach($_REQUEST As $k=>$v)
		echo "Clave: " . $k . " Valor: " . $v . "<br/>";

	echo "DATOS DE PETICIÓN GET:<br/>";
	echo var_dump($_GET) . "<br/>";

	if(count($_GET)>0){
		echo "SEPARACIÓN DE CAMPOS POR CLAVE-VALOR<br/>";
		foreach($_GET As $k=>$v)
			echo "->Clave: " . $k . " Valor: " . $v . "<br/>";
	}
	else
		echo "No llegaron datos por petición GET.<br/>";

	echo "DATOS DE PETICIÓN POST:<br/>";
	echo var_dump($_POST) . "<br/>";
	
	if(count($_POST)>0){
		echo "SEPARACIÓN DE CAMPOS POR CLAVE-VALOR<br/>";
		foreach($_POST As $k=>$v)
			echo "->Clave: " . $k . " Valor: " . $v . "<br/>";
	}
	else
	echo "No llegaron datos por petición POST.<br/>";
?>