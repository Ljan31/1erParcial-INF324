<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'administrativo') {
    header("Location: login.php");
    exit();
}

include 'conexion.php';

// Modificar la consulta para incluir el rol
$sql = "SELECT p.*, u.rol FROM persona p LEFT JOIN usuario u ON p.ci = u.ci";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Personas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <?php include('./nav.php'); ?>

    <main>
        <div class="text-center mt-3">
            <h1>Lista de Personas</h1>
        </div>
        <div class="container mt-5">
            <a class="btn btn-primary" href='nuevaPersona.php'>Nuevo</a>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>    
                        <th scope="col">Nro.</th>
                        <th scope="col">CI</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Paterno</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Operaciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    $nro = 1;
                    while ($fila = mysqli_fetch_array($resultado)) {
                        echo "<tr>";
                        echo "<td>{$nro}</td>"; 
                        echo "<td scope='row'>{$fila['ci']}</td>";
                        echo "<td>{$fila['nombre']}</td>";
                        echo "<td>{$fila['paterno']}</td>";
                        echo "<td>{$fila['rol']}</td>"; // Mostrar el rol
                        echo "<td>";
                        echo "<a class='btn btn-secondary me-2' href='editarPersona.php?ci={$fila['ci']}'>Editar</a>";
                        echo "<a class='btn btn-danger me-2' href='eliminarPersona.php?ci={$fila['ci']}'>Eliminar</a>";
                        echo "<a class='btn btn-success me-2' href='AgregarPropiedad.php?ci={$fila['ci']}'>Agregar Propiedad</a>";
                        echo "<a class='btn btn-outline-primary' href='VerPropiedades.php?ci={$fila['ci']}'>Ver Propiedadades</a>";
                        echo "</td>";
                        echo "</tr>";
                        $nro++; 
                    }
                    ?>
                </tbody>
            </table>
        </div>        
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
