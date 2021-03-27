<?php
	require "auto.php";

	$auto1=new Auto("rojo",10,"Ferrari",'26/3/2021');
	$auto2=new Auto("amarillo",10,"Ferrari",'26/3/2021');
	$auto3=new Auto("rojo",11,"Ferrari",'26/3/2021');
	$auto4=new Auto("rojo",12,"Ferrari",'26/3/2021');
	$auto5=new Auto("rojo",10,"Lamborghini",'24/3/2021');
	$auto6=new Auto("rojo",10,"Ferrari",'25/3/2021');

	#Se suma $1500 en impuestos a los últimos tres autos
	$auto4->AgregarImpuestos(1500);
	$auto5->AgregarImpuestos(1500);
	$auto6->AgregarImpuestos(1500);

	#Se muestra características de los últimos tres autos
	Auto::MostrarAuto($auto4);
	Auto::MostrarAuto($auto5);
	Auto::MostrarAuto($auto6);

	#Se suman los importes de los dos primeros autos(si cumplen requisitos)
	echo "Importe de auto1 + auto2: \$" . Auto::Add($auto1,$auto2) . "<br/>";

	#Compara dos autos
	echo "Auto1 igual a auto2: " . $auto1->Equals($auto2) . "<br/>";
	echo "Auto1 igual a auto5: " . $auto1->Equals($auto5) . "<br/>";

	#Se muestra características de los autos impares
	Auto::MostrarAuto($auto1);
	Auto::MostrarAuto($auto3);
	Auto::MostrarAuto($auto5);
?>