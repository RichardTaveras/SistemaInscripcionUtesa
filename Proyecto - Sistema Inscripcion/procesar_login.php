<?php
// Conectar a la base de datos de PhpMyAdmin
$dsn = 'mysql:dbname=inscripcion;host=localhost';
$usuario = 'root';
$password = '';

try {
    $conexion = new PDO($dsn, $usuario, $password);
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
    exit();
}

// Obtener los valores enviados por el formulario
$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Crear la consulta SQL para buscar el usuario y el password en la tabla "usuarios"
$consulta = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";

$statement = $conexion->prepare($consulta);
$statement->execute(array(':usuario' => $usuario, ':password' => $password));
$resultado = $statement->fetch(PDO::FETCH_ASSOC);

// Verificar si se encontró algún registro en la tabla
if ($resultado) {
    // Si el usuario y el password son correctos, establecer la sesión del usuario y redireccionar a la página correspondiente según su rol
    session_start();
    $_SESSION['usuario'] = $resultado['usuario'];
    $_SESSION['rol'] = $resultado['rol'];
    if ($_SESSION['rol'] == 'admin') {
        header('Location: Menu/index.html');
    } elseif ($_SESSION['rol'] == 'estudiante') {
        header('Location: estudiante.php');
    } else {
        echo "Rol no reconocido";
    }
    exit;
} else {
    // Si el usuario o el password son incorrectos, mostrar un mensaje de error
    echo "Usuario o contraseña incorrectos";
}
?>
