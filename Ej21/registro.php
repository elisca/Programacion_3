<?php
	require "usuario.php";

	$arrayUsuarios=array();

	echo "Nombre: " . $_POST["txtNombre"] . " Clave: " . $_POST["txtClave"] . " Email: " . $_POST["txtEmail"] . "<br/>";
	$uNombre=$_POST["txtNombre"];
	$uClave=$_POST["txtClave"];
	$uEmail=$_POST["txtEmail"];

	if(isset($uNombre) && isset($uClave) && isset($uEmail)){
		$usuario=new Usuario($uNombre,$uClave,$uEmail);
		array_push($arrayUsuarios, $usuario);
	}
	else{
		echo "Falta al menos un dato para poder crear el usuario. Ingresar información nuevamente.<br/>";
	}

	var_dump($arrayUsuarios);
	$archivo=fopen("Registro.csv","a");
	echo "Archivo: " . $archivo . "<br/>";

	foreach ($arrayUsuarios as $u) {
		fwrite($archivo,$u->GetNombre() . ",");
		fwrite($archivo,$u->GetClave() . ",");
		fwrite($archivo,$u->GetEmail() . PHP_EOL);
	}
	fclose($archivo);
?>