<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "inscripcion");

// Verificar si se recibió un formulario de registro
if (isset($_POST['usuario'])  && isset($_POST['password']) && isset($_POST['correo']) ) {
    
    // Obtener los datos del formulario
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $correo = $_POST['correo'];
    
    if (empty($usuario) || empty($correo) || empty($password)) {
        // Si algún campo está vacío, redirigir al formulario de registro con un mensaje de error
        header("Location: registro.php?error=campos_vacios");
        exit();
    }
    
    // Verificar si el usuario ya existe en la base de datos
    $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $resultado = mysqli_query($conexion, $consulta);
    if (mysqli_num_rows($resultado) > 0) {
        // El usuario ya existe, redirigir al formulario de registro con un mensaje de error
        header("Location: registro.php?error=usuario_existente");
        exit();
    } else {
        // El usuario no existe, insertar los datos en la base de datos
        $consulta = "INSERT INTO usuarios (usuario, correo, password, rol) VALUES ('$usuario', '$correo', '$password','estudiante')";
        mysqli_query($conexion, $consulta);
        // Redirigir al usuario a la página de inicio de sesión
        header("Location: login.php?registro=exitoso");
        exit();
    }
} else {
    // No se recibió un formulario de registro, redirigir al formulario de registro con un mensaje de error
    header("Location: registro.php?error=formulario_invalido");
    exit();
}
?>
