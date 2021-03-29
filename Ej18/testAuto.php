<?php
	#probar funcionalidad en este archivo
	#errores en funciones Add y Remove de garage.php
	require "garage.php";

	#Garages
	$objGarageStar=new Garage("GARAGE STAR S.A.",100);
	$objGarageLomitas=new Garage("Lomitas S.A.");

	#Autos
	$objAuto01=new Auto("Rojo",100000,"Smart",'29/3/2021');
	$objAuto02=new Auto("Amarillo",85000,"Megane",'28/3/2021');
	$objAuto03=new Auto("Verde",65000,"Gol",'25/3/2021');
	$objAuto04=new Auto("Rojo",100000,"Smart",'29/3/2021');

	#Mostramos datos de los garages
	$objGarageStar->MostrarGarage();
	$objGarageLomitas->MostrarGarage();

	#Agregamos los primeros 3 autos al garage Star
	$objGarageStar->Add($objAuto01);
	$objGarageStar->Add($objAuto02);
	$objGarageStar->Add($objAuto03);

	#Agregamos un auto ya existente al garage(aplica a coincidente)
	$objGarageStar->Add($objAuto01);

	#Comprobamos si en el garage Star estan los primeros dos autos definidos
	echo "Auto 1 en Garage Star: " . $objGarageStar->Equals($objAuto01) . "<br/>";
	echo "Auto 2 en Garage Star: " . $objGarageStar->Equals($objAuto02) . "<br/>";

	#Comprobamos si en el garage Star esta un autos no ingresado al mismo
	echo "Auto 4 en Garage Star: " . $objGarageStar->Equals($objAuto04) . "<br/>";

	#Quitamos el segundo auto del garage Star
	$objGarageStar->Remove($objAuto01);

	#Mostramos datos del garage Star
	$objGarageStar->MostrarGarage();
?>