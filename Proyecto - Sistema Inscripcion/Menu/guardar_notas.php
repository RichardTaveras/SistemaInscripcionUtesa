<?php

// Conectarse a la base de datos
$mysqli = new mysqli('localhost', 'root', '', 'inscripcion');

// Verificar la conexión
if ($mysqli->connect_error) {
    die('Error de conexión (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}

// Obtener los datos del formulario
$id = $_POST['id'];
$notas = $_POST['notas'];

// Actualizar la base de datos con las notas
$query = "UPDATE datos_inscripcion SET notas='$notas' WHERE id=$id";
$mysqli->query($query);

// Redirigir de vuelta a la página anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;

// Cerrar la conexión
$mysqli->close();
?>
