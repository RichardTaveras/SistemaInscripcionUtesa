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

// Consulta de estudiantes
$sql = "SELECT id, nombre, email, estado FROM datos_inscripcion";
$result = $conn->query($sql);

// Generación del correo electrónico para cada estudiante
require 'PHPMailer.php';
require 'Exception.php';
require 'SMTP.php';
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->CharSet = 'UTF-8';

$mail->IsSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPSecure = 'tls';
$mail->Port       = 587;
$mail->SMTPDebug  = 1;
$mail->SMTPAuth   = true;
$mail->Username   = 'bm7068959@gmail.com';
$mail->Password   = 'wodgypasevzfijgq';
$mail->SetFrom('bm7068959@gmail.com', "Sistema Corporativo - UTESA ");
$mail->AddReplyTo('no-reply@mycomp.com','no-reply');

while ($row = $result->fetch_assoc()) {
    $to = $row["email"];
    $subject = "Estatus de tu progreso académico";
    $message = "Hola " . $row["nombre"] . ",<br><br>";
    $message .= "Tu estatus actual es: " . $row["estado"] . ".<br><br>";
    $message .= "Gracias por tu compromiso con tus estudios.<br><br>";
    $message .= "Saludos cordiales,<br>";
    $message .= "Equipo de la institución educativa";
    $mail->MsgHTML($message,$subject);
    // Envío del correo electrónico
    $mail->AddAddress($to,$row["nombre"]);
    $mail->send();
    
}
header('Location: backtwo.html');
// Cierre de la conexión a la base de datos
$conn->close();

?>
