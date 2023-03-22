<style>
    button {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      color: #fff;
      font-weight: bold;
    }
    
    button.editar {
      background-color: yellow;
    }
    
    button.borrar {
      background-color: red;
    }
  </style>
<?php include('encabezado.php');?>

<!--INICIO del cont principal-->
<div class="container">
    <h2>Mantenimiento Usuario</h2>
    <br>
 <?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, usuario, correo, password, rol FROM usuarios";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button onclick="window.location.href = 'ManUsuario.php';"  id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo Usuario</button>    
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <?php
                // Mostrar la lista de usuarios en una tabla
echo "<table style='border-collapse: collapse; width: 100%;'>";
echo "<tr style='background-color: #4CAF50; color: white;'>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>ID</th>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>Usuario</th>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>Correo</th>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>Password</th>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>Rol</th>";
echo "<th style='border: 1px solid #ddd; padding: 8px;'>Acciones</th>";
echo "</tr>";
foreach ($data as $fila) {
    echo "<tr style='background-color: #f2f2f2;'>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $fila["id"] . "</td>";
    echo "<td style='border:1px solid #ddd; padding: 8px;'>" . $fila["usuario"] . "</td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $fila["correo"] . "</td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $fila["password"] . "</td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $fila["rol"] . "</td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>";
    echo "<a href='editar_usuario.php?id=" . $fila["id"] . "' style='text-decoration: none; color: blue;'>Editar</a> | ";
    echo "<a href='eliminar_usuario.php?id=" . $fila["id"] . "' style='text-decoration: none; color: red;' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este usuario?\")'>Eliminar</a>";
    echo "</td>";
    echo "</tr>";
    }
    echo "</table>";
    
    // Cerrar la conexión a la base de datos
   // $objeto->CerrarConexion();
    ?>                   
                    </div>
                </div>
        </div>  
    </div>         
    
    
</div>
<!--FIN del cont principal-->
<?php include('pie.php');?>