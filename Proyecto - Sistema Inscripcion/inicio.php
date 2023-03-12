<!doctype html>
<html>
<head>
    <link rel="shortcut icon" href="#" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inicio</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">        
        
    <link rel="stylesheet" type="text/css" href="fuentes/iconic/css/material-design-iconic-font.min.css">
        
</head>
    
<body class="bg-light">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <a class="navbar-brand" href="#">LOGO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Opción 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Opción 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Opción 3</a>
                    </li>
                    <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0" id="formInicio" action="" method="post">
                         <button type="submit" name="submit" class="btn btn-danger my-2 my-sm-0">Cerrar sesión</button>
                    </form>

                    </li>
                </ul>
            </div>
        </nav>
        
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Bienvenido</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed posuere, enim nec tempor bibendum, erat nisi molestie velit, id varius enim ex sit amet dolor. Suspendisse vel malesuada quam, non tincidunt justo. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="jquery/jquery-3.3.1.min.js"></script>    
    <script src="bootstrap/js/bootstrap.min.js"></script>    
    <script src="popper/popper.min.js"></script>    
        
    <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>    
    <script src="codigo.js"></script>    
   
   <?php
session_start();
 
if(isset($_POST['submit'])){
    // Eliminar todas las variables de sesión
    $_SESSION = array();
     
    // Destruir la sesión
    session_destroy();
     
    // Redirigir al usuario a la página de inicio de sesión
    header("location: login.html");
    exit;
}
?>

</body>
</html>

