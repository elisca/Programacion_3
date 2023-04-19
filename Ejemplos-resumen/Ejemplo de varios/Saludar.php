<?php
	echo "GET: ";
	var_dump($_GET);
	echo "<br/>";
	echo "POST: ";
	var_dump($_POST);
	echo "<br/>";

	echo "Bienvenido/a ", $_POST['txtNombre'];
?>