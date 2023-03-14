<!DOCTYPE html>
<html>
<head>
	<title>Mi página de inscripciones</title>
	<style>
		/* Estilos CSS para la tabla */
     /* Estilos CSS para la tabla */
table {
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 30px;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #009933; /* verde */
  color: #fff; /* blanco */
}

tr:hover {
  background-color: #ffcc00; /* naranja */
}

a {
  color: #007bff;
  text-decoration: none;
}

a:hover {
  color: #0056b3;
  text-decoration: underline;
}

.btn-approve {
  display: inline-block;
  padding: 6px 12px;
  background-color: #28a745; /* verde */
  color: #fff;
  font-size: 14px;
  font-weight: bold;
  border: 2px solid #28a745; /* verde */
  border-radius: 4px;
  text-decoration: none;
}

.btn-approve span {
  display: inline-block;
  margin-right: 8px;
}

.btn-approve i {
  display: inline-block;
  font-size: 12px;
  margin-left: 8px;
}

/* Estilos CSS para el encabezado */
h1 {
  font-size: 28px;
  margin-top: 0;
  color: #009933; /* verde */
}

/* Estilos CSS para el contenedor principal */
.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);
  color: #333; /* negro */
}

/* Estilos CSS para el botón "Ver archivos" */
.tablink {
  display: inline-block;
  padding: 6px 12px;
  background-color: #009933; /* verde */
  color: #fff;
  font-size: 14px;
  font-weight: bold;
  border: 2px solid #009933; /* verde */
  border-radius: 4px;
  text-decoration: none;
}

.tablink:hover {
  background-color: #ffcc00; /* naranja */
  border-color: #ffcc00; /* naranja */
  color: #333; /* negro */
}


.tab {
  overflow: hidden;
  border-bottom: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Enlace del menú de subpestañas */
.tab a {
  float: left;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  border-bottom: none;
}

/* Cambio de color del enlace del menú de subpestañas en el mouse */
.tab a:hover {
  background-color: #ddd;
}

/* Enlace activo del menú de subpestañas */
.tab a.active {
  background-color: #ccc;
  color: white;
  border-bottom: 1px solid #ccc;
}
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

.tab:not(a.active):hover {
  background-color: white;
  color: green;
  border-bottom-color: white;
}

	</style>

    <!-- Agregar los scripts JavaScript -->
	<script>
		function openTab(evt, tabName) {
		  // Obtener todas las subpestañas y ocultarlas
		  var i, tabcontent, tablinks;
		  tabcontent = document.getElementsByClassName("tabcontent");
		  for (i = 0; i < tabcontent.length; i++) {
		    tabcontent[i].style.display = "none";
		  }

		  // Obtener todos los botones de la pestaña y desactivarlos
		  tablinks = document.getElementsByClassName("tablink");
		  for (i = 0; i < tablinks.length; i++) {
		    tablinks[i].className = tablinks[i].className.replace(" active", "");
		  }

		  // Mostrar la subpestaña correspondiente y activar su botón
		  document.getElementById(tabName).style.display = "block";
		  evt.currentTarget.className += " active";
		}
       

	</script>
</head>


<body>
  
<div class="container">
<?php
// Conectarse a la base de datos
$mysqli = new mysqli('localhost', 'root', '', 'inscripcion');

// Verificar la conexión
if ($mysqli->connect_error) {
    die('Error de conexión (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}

// Si el administrador ha aprobado una inscripción, actualiza la base de datos
if (isset($_POST['id']) && isset($_POST['estado'])) {
    $id = $_POST['id'];
    $estado = $_POST['estado'];
    $query = "UPDATE datos_inscripcion SET estado='estado' WHERE id=$id";
    $mysqli->query($query);
}

// Consultar las inscripciones y sus archivos adjuntos
$query = "SELECT * FROM datos_inscripcion";
$result = $mysqli->query($query);

// Mostrar las inscripciones y sus archivos adjuntos en una tabla
echo '<table>';
echo '<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Estado</th><th>Acción</th></tr>';
while ($row = $result->fetch_assoc()) {
    
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['nombre'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['estado'] . '</td>';
    echo '</tr>';

         // Mostrar el botón de aprobación si la inscripción no ha sido aprobada
         if ($row['estado'] == 'pendiente') {
            echo '<td><a class="btn-approve" href="aprobar.php?id=' . $row['id'] . '"><span>Aprobar</span> <i class="fas fa-check"></i></a></td>';
        } else {
            echo '<td></td>';
        }
     // Agregar el botón "Ver archivos" y el div oculto para cada fila
    
     echo '<td><button class="tablink" onclick="openTab(event, \'tab-' . $row['id'] . '\')">Ver archivos</button></td>';
    
     
     echo '</tr>'; // <--- aquí
     echo '<tr class="tabcontent" id="tab-' . $row['id'] . '" style="display: none">'; 
echo '<td colspan="11">';
echo '<div class="container-fluid">';
echo '<div class="row">';
echo '<div class="col-md-12">';
echo '<ul>';
echo '<li><a href="archivos/fotos/' . $row['foto'] . '">Foto</a></li>';
echo '<li><a href="archivos/actas_nacimiento/' . $row['acta_nacimiento'] . '">Acta de nacimiento</a></li>';
echo '<li><a href="archivos/certificaciones_bachiller/' . $row['certificacion_bachiller'] . '">Certificación de bachiller</a></li>';
echo '<li><a href="archivos/records_calificaciones/' . $row['record_calificaciones'] . '">Records de calificaciones</a></li>';
echo '<li><a href="archivos/certificados_salud/' . $row['certificado_salud'] . '">Certificado de salud</a></li>';
echo '<li><a href="archivos/cedulas_identidad/' . $row['cedula_identidad'] . '">Cédula de identidad</a></li>';

echo '</ul>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</td>';
echo '</tr>';
    }


    


   


// Cerrar la conexión
$mysqli->close();
?>


</body>
</html>