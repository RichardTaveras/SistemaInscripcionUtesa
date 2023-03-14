
<!DOCTYPE html>
<html>

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="estilo.css">

    
</head>

<body>
    <div class="login-dark">
            <!-- Agregamos el formulario de registro -->     
                
<form action="procesar_registro.php" method="post">
    <h2 class="sr-only">Registro de Usuario</h2>
    <div class="illustration"><i class="icon ion-ios-person"></i></div>
    <div class="form-group"><input class="form-control" type="text" name="usuario" placeholder="usuario"></div>
    <div class="form-group"><input class="form-control" type="password" name="password" placeholder="password"></div>
    <div class="form-group"><input class="form-control" type="email" name="correo" placeholder="correo"></div>
    <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Registrarse</button></div>
    </form>
        
    <?php
        // Verificar si hay un mensaje de error o de registro exitoso en la URL
        if (isset($_GET['error']) && $_GET['error'] == 'campos_vacios') {
            echo '<div class="alert alert-danger" role="alert">Error: Campo Vacio.</div>';
        if (isset($_GET['error']) && $_GET['error'] == 'formulario_invalido') {
            echo '<div class="alert alert-danger" role="alert">Error: formulario inválido.</div>';
        } elseif (isset($_GET['error']) && $_GET['error'] == 'usuario_existente') {
            echo '<div class="alert alert-danger" role="alert">Error: usuario ya registrado.</div>';
        }
    }
        ?>

        


    
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>



