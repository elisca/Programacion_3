<?php
	require "usuario.php";

	$listaUsuarios=array();

	$bdUsuarios=fopen("Registro.csv","r");

	while(!feof($bdUsuarios)){
		$auxDatos=explode(",",fgets($bdUsuarios));
		$auxUsuario=new Usuario($auxDatos[0],$auxDatos[1],$auxDatos[2]);
		array_push($listaUsuarios,$auxUsuario);
	}
	fclose($bdUsuarios);
?>