

<!DOCTYPE html>
<html>

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="estilo.css">

    <script>
        const forgotLink = document.getElementById('forgot-link');
    
        forgotLink.addEventListener('click', () => {
            forgotLink.textContent = 'Register now';
            forgotLink.href = 'registro.php';
        });
    </script>
    <?php
if (isset($_GET['registro']) && $_GET['registro'] == 'exitoso') {
    echo '<div class="alert alert-success" role="alert">Registro exitoso.</div>';
}
?>
</head>

<body>
    <div class="login-dark">
        <form  action="procesar_login.php" method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="usuario" placeholder="Usuario"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div>
            <a href="registro.php" id="forgot-link" class="forgot">Registrarse ahora</a>
            <!-- Agregamos el formulario de registro -->
        
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

</body>

</html>
