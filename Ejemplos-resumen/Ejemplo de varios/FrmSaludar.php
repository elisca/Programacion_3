<html>
	<head>
		<title>Peticiones</title>
	</head>
	<body>
		<!-- Action es donde impacta en el servidor los datos de este archivo, y method el metodo de peticion -->
		<form action="Saludar.php" method="POST">
			Nombre:<input type="text" name="txtNombre"><br>
			Apellido:<input type="text" name="txtApellido"><br>
			<input type="submit" value="Enviar">
		</form>
	</body>
</html>