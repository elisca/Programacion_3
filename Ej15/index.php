<?php
	require_once "./clases.php";

	$objRectangulo=new Rectangulo(5,3);
	$objRectangulo->ToString();
	$objRectangulo->SetColor("red");
	$objRectangulo->Dibujar();

	$objTriangulo=new Triangulo(3,5);
	$objTriangulo->ToString();
	$objTriangulo->Dibujar();
?>