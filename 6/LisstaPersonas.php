<?php
include 'conexion.php';
$sql = "select p.ci, p.nombre, p.paterno, c.id,
    case when c.id like '1%' then 'Impuesto Alto'
        when c.id like '2%' then 'Impuesto Medio'
        when c.id like '3%' then 'Impuesto Bajo'
        else 'Sin Clasificación'
    end as tipo_impuesto
from persona p
join catastro c ON p.ci = c.ci
order by c.id;";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Personas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <?php include('./nav.php'); ?>

    <main>
        <div class="text-center mt-3">
            <h1>Lista de Personas por impuesto</h1>
        </div>
        <div class="container mt-5">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>    
                        <th scope="col">Nro.</th>
                        <th scope="col">CI</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Paterno</th>
                        <th scope="col">Codigo</th>
                        <th scope="col">Tipo Impuesto</th>
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
                        echo "<td>{$fila['id']}</td>";
                        echo "<td>{$fila['tipo_impuesto']}</td>"; // Mostrar el rol
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
