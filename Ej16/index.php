<?php
	require "./clases.php";

	$objV1=new Punto(1,1);
	$objV3=new Punto(3,5);

	$objRectangulo=new Rectangulo($objV1,$objV3);
	$objRectangulo->Dibujar();
?>