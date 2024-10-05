<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'administrativo') {
    header("Location: login.php");
    exit();
}

include 'conexion.php';

// Obtener todos los datos de catastro
$sqlCatastro = "SELECT * FROM catastro";
$resultadoCatastro = mysqli_query($conn, $sqlCatastro);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Catastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <?php include('./nav.php'); ?>

    <main class="p-5">
        <div class="text-center mt-3">
            <h1>Lista de Catastros</h1>
        </div>
        <a class="btn btn-primary" href='NuevoCatastro.php'>Nuevo</a>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nro.</th>
                    <th scope="col">ID</th>
                    <th scope="col">Zona</th>
                    <th scope="col">X Inicio</th>
                    <th scope="col">Y Inicio</th>
                    <th scope="col">X Fin</th>
                    <th scope="col">Y Fin</th>
                    <th scope="col">Metros Cuadrados</th>
                    <th scope="col">CI</th>
                    <th scope="col">Distrito</th>
                    <th scope="col">Operaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nro = 1;  // Contador para el número de fila
                while ($fila = mysqli_fetch_array($resultadoCatastro)) {
                    echo "<tr>";
                    echo "<td>{$nro}</td>"; 
                    echo "<td>{$fila['id']}</td>";
                    echo "<td>{$fila['zona']}</td>";
                    echo "<td>{$fila['xini']}</td>";
                    echo "<td>{$fila['yini']}</td>";
                    echo "<td>{$fila['xfin']}</td>";
                    echo "<td>{$fila['yfin']}</td>";
                    echo "<td>{$fila['superficie']}</td>"; 
                    if ($fila['ci'] == 0) {
                      echo "<td class='text-success'>Libre</td>";
                      echo "<td>{$fila['distrito']}</td>";
                        echo "<td>";
                        echo "<a class='btn btn-secondary me-2' href='EditarCatastro.php?id={$fila['id']}'>Editar</a>";
                        echo "<a class='btn btn-danger me-2' href='EliminarCatastro.php?id={$fila['id']}'>Eliminar</a>";
                        // echo "<a class='btn btn-success' href='agregar_dueño.php?id={$fila['id']}'>Agregar Dueño</a>";
                        echo "</td>";
                    } else {
                        echo "<td>{$fila['ci']}</td>";
                        echo "<td>{$fila['distrito']}</td>";
                        echo "<td>";
                        echo "<a class='btn btn-secondary me-2' href='EditarCatastro.php?id={$fila['id']}'>Editar</a>";
                        echo "<a class='btn btn-danger me-2' href='EliminarCatastro.php?id={$fila['id']}'>Eliminar</a>";
                        echo "<a class='btn btn-success' href='VerDueño.php?ci={$fila['ci']}'>Ver Dueño</a>";
                        echo "</td>";
                    }
                    echo "</tr>";
                    $nro++; 
                }
                ?>
            </tbody>
        </table>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
