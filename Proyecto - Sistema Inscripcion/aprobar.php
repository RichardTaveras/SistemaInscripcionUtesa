<?php

// Conectarse a la base de datos
$mysqli = new mysqli('localhost', 'root', '', 'inscripcion');

// Verificar la conexión
if ($mysqli->connect_error) {
    die('Error de conexión (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}

// Obtener el ID de la inscripción a aprobar
$id = $_GET['id'];

// Actualizar el estado de la inscripción a "aprobado"
$query = "UPDATE datos_inscripcion SET estado='aprobado' WHERE id=?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id);
$result = $stmt->execute();

if ($result) {
    // Redirigir de vuelta a la página de administración
    header("Location: admin.php");
} else {
    // Mostrar un mensaje de error si falla la actualización
    echo "Error al aprobar la inscripción.";
}


// Cerrar la conexión
$mysqli->close();

?>
