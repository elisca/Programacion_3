<?php
	require "prueba-arrays.php";

	$objPers01=new Persona("Ezequiel","Lisca",29,'m');
	$objPers02=new Persona("A","B",1,'f');
	$objEmp01=new Empleado("Ezequiel","Lisca",29,'m',"Tecnico",45000);
	$objEmp02=new Empleado("A","B",1,'f',"Modelo",15000);

	var_dump($objPers01);
	echo "<br/>";
	var_dump($objPers02);
	echo "<br/>";
	var_dump($objEmp01);
	echo "<br/>";
	var_dump($objEmp02);
	echo "<br/>";

	echo "------------------------------------------<br/>";
	$objPers01->ToString();
	echo "------------------------------------------<br/>";
	$objPers02->ToString();
	echo "------------------------------------------<br/>";
	$objEmp01->ToString();
	echo "------------------------------------------<br/>";
	$objEmp02->ToString();
	echo "------------------------------------------<br/>";
	$objEmp01->MostrarDatos();
	echo "------------------------------------------<br/>";

	$objNums=new Numeros();
	$objNums->AgregarElementoFinal(10);
	$objNums->AgregarElementoFinal(11);
	$objNums->AgregarElementoFinal(12);
	$objNums->MostrarArray();
	$objNums->QuitarElementoFinal();
	$objNums->MostrarArray();
	$objNums->AgregarElementoInicio(01);
	$objNums->AgregarElementoInicio(02);
	$objNums->MostrarArray();
	$objNums->QuitarElementoInicio();
	$objNums->MostrarArray();
?>