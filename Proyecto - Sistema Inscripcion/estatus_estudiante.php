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

$id = $_GET['id'];
// Consulta de estudiantes
$sql = "SELECT id, nombre, email, estado FROM datos_inscripcion WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Mostrar el estado del estudiante
    echo "<h1 class='resultado'>El estado de " . $row["nombre"] . " es " . $row["estado"] . "</h1> ";
} else {
    echo "No se encontró ningún estudiante con el id $id";
}


// Cierre de la conexión a la base de datos
$conn->close();

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simple Progress Bar</title>
  <style>
 body {
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: green;
  height: 100vh;
  padding: 0;
  margin: 0;
}

.progress {
    background: rgba(255,255,255,0.1);
    justify-content: flex-start;
    border-radius: 100px;
    align-items: center;
    position: relative;
    padding: 0 6px;
    display: flex;
    height: 40px;
    width: 500px;
    margin-top: -30px; /* margen superior negativo para superponer la barra al resultado */
  }

  .progress-value {
    animation: load 3s normal forwards;
    box-shadow: 0 10px 40px -10px #fff;
    border-radius: 100px;
    background: #fff;
    height: 30px;
    width: 0;
  }

  @keyframes load {
    0% { width: 0; }
    100% { width: 68%; }
  }

  .resultado {
    font-size: 24px;
    color: white;
    margin-top: 20px; /* margen inferior para separar del título */
    padding-bottom: 1%;
  }


  
</style>

</head>
<body>


<div class="progress">
  <div class="progress-value"></div>
</div>
</body>
</html>