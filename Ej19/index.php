<?php
	require "clases.php";

	#Instancias de objetos
	$vueloAirlines=new Vuelo("Airline",1000,10);
	$vueloAerolineas=new Vuelo("Aerolineas",850,5);
	$vueloGool=new Vuelo("Gool",1250,20);

	$pasajero01=new Pasajero("Lisca","Ezequiel","100",true);
	$pasajero02=new Pasajero("Lisca","Ariel","101",true);
	$pasajero03=new Pasajero("Lisca","Adrian","102",false);
	$pasajero04=new Pasajero("Sciume","Viviana","103",false);

	#Airlines
	$vueloAirlines->AgregarPasajero($pasajero01);
	$vueloAirlines->AgregarPasajero($pasajero02);
	$vueloAirlines->AgregarPasajero($pasajero03);
	$vueloAirlines->AgregarPasajero($pasajero04);

	$vueloAirlines->GetInfoVuelo();

	#Aerolineas
	$vueloAerolineas->AgregarPasajero($pasajero01);
	$vueloAerolineas->AgregarPasajero($pasajero02);

	$vueloAerolineas->GetInfoVuelo();

	#Sumar dos empresas
	echo "Total recaudado: \$: " . Vuelo::Add($vueloAirlines,$vueloAerolineas) . "<br/>";

	#Agrego a un pasajero ya existente en el vuelo
	$vueloAerolineas->AgregarPasajero($pasajero02);

	#Remueve un pasajero existente en el vuelo
	Vuelo::Remove($vueloAerolineas,$pasajero02);

	#Intenta remover un pasajero que ya no existe en el vuelo
	Vuelo::Remove($vueloAerolineas,$pasajero02);
?>