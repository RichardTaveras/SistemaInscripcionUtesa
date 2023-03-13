<?php
// Configurar la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inscripcion";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión a la base de datos
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
$foto = $_FILES["foto"]["name"];
$acta_nacimiento = $_FILES["acta_nacimiento"]["name"];
$certificacion_bachiller = $_FILES["certificacion_bachiller"]["name"];
$record_calificaciones = $_FILES["record_calificaciones"]["name"];
$certificado_salud = $_FILES["certificado_salud"]["name"];
$cedula_identidad = $_FILES["cedula_identidad"]["name"];

// Mover los archivos subidos a la carpeta deseada
$foto_destino = "archivos/fotos/" . $foto;
$acta_nacimiento_destino = "archivos/actas_nacimiento/" . $acta_nacimiento;
$certificacion_bachiller_destino = "archivos/certificaciones_bachiller/" . $certificacion_bachiller;
$record_calificaciones_destino = "archivos/records_calificaciones/" . $record_calificaciones;
$certificado_salud_destino = "archivos/certificados_salud/" . $certificado_salud;
$cedula_identidad_destino = "archivos/cedulas_identidad/" . $cedula_identidad;

move_uploaded_file($_FILES["foto"]["tmp_name"], $foto_destino);
move_uploaded_file($_FILES["acta_nacimiento"]["tmp_name"], $acta_nacimiento_destino);
move_uploaded_file($_FILES["certificacion_bachiller"]["tmp_name"], $certificacion_bachiller_destino);
move_uploaded_file($_FILES["record_calificaciones"]["tmp_name"], $record_calificaciones_destino);
move_uploaded_file($_FILES["certificado_salud"]["tmp_name"], $certificado_salud_destino);
move_uploaded_file($_FILES["cedula_identidad"]["tmp_name"], $cedula_identidad_destino);

// Insertar los datos en la base de datos
$sql = "INSERT INTO datos_inscripcion (nombre, apellido, email, telefono, direccion, foto, acta_nacimiento, certificacion_bachiller, record_calificaciones, certificado_salud, cedula_identidad)
VALUES ('$nombre', '$apellido', '$email', '$telefono', '$direccion', '$foto', '$acta_nacimiento', '$certificacion_bachiller', '$record_calificaciones', '$certificado_salud', '$cedula_identidad')";

if ($conn->query($sql) === TRUE) {
    echo "Los datos han sido insertados correctamente.";
} else {
    echo "Error al insertar los datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
