<!DOCTYPE html>
<html>
<head>
	<title>Formulario de inscripción</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f7f7f7;
		}

		h1 {
			text-align: center;
			margin-top: 30px;
		}

		form {
			background-color: #fff;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);
			width: 600px;
			margin: 0 auto;
			margin-top: 50px;
			margin-bottom: 50px;
		}

		label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
  font-size: 16px;
  text-align: center; /* centrado de los labels */
}

input[type=text], 
input[type=email], 
input[type=tel], 
input[type=file] {
  display: block;
  margin-bottom: 20px;
  width: 100%; /* ancho del input al 100% */
  padding: 10px;
  border: 2px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-size: 16px;
}
input[type=submit] {
  background-color: #4CAF50;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  font-size: 18px;
  cursor: pointer;
  margin-top: 20px;
}

input[type=submit]:hover {
  background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<h1>Formulario de inscripción</h1>
	<form action="procesar_inscripcion.php" method="POST" enctype="multipart/form-data">

    <label for="nombre">Nombre:</label>
		<input type="text" name="nombre" id="nombre" required><br><br>

    <label for="apellido">Apellido:</label>
	<input type="text" name="apellido" id="apellido" required><br><br>

	<label for="email">Email:</label>
	<input type="email" name="email" id="email" required><br><br>

	<label for="telefono">Teléfono:</label>
	<input type="tel" name="telefono" id="telefono" required><br><br>

	<label for="direccion">Dirección:</label>
	<input type="text" name="direccion" id="direccion" required><br><br>

		<label for="foto">Foto tamaño 2" x 2":</label>
		<input type="file" name="foto" id="foto" required>

		<label for="acta_nacimiento">Acta de nacimiento legalizada:</label>
		<input type="file" name="acta_nacimiento" id="acta_nacimiento" required>

		<label for="certificacion_bachiller">Certificación de Bachiller expedida por el Ministerio de Educación Superior, Ciencia y Tecnología (MESCyT):</label>
		<input type="file" name="certificacion_bachiller" id="certificacion_bachiller" required>

		<label for="record_calificaciones">Récord de calificaciones del bachillerato:</label>
		<input type="file" name="record_calificaciones" id="record_calificaciones" required>

		<label for="certificado_salud">Certificado de salud:</label>
		<input type="file" name="certificado_salud" id="certificado_salud" required>

		<label for="cedula_identidad">Copia de la cédula de identidad y electoral:</label>
		<input type="file" name="cedula_identidad" id="cedula_identidad" required>

		<input type="submit" name="submit" value="Enviar">
	</form>
</body>
</html>
