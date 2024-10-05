<?php 
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'administrativo') {
    header("Location: login.php");
    exit();
}

$ci = $_GET["ci"];

include "conexion.php";
$sql = "SELECT * FROM persona WHERE ci = $ci";
$resultado = mysqli_query($conn, $sql);
$fila = mysqli_fetch_array($resultado);
$nombre = $fila["nombre"];
$paterno = $fila["paterno"];

// Consulta para obtener propiedades del dueño
$sqlPropiedades = "SELECT * FROM catastro WHERE ci = $ci";
$resultadoPropiedades = mysqli_query($conn, $sqlPropiedades);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dueño</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <?php include('./nav.php'); ?>

    <main class="container mt-5">
        <div class="text-center mb-4">
            <h1>Dueño</h1>
        </div>
        
        <form action="" method="POST">
            <div class="mb-3 row">
            <div class="col">
                <label for="ci" class="form-label">CI:</label>
                <input type="text" class="form-control" id="ci" name="ci" value="<?php echo $ci; ?>" readonly>
            </div>
            <div class="col">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" readonly>
            </div>
            <div class="col">
                <label for="paterno" class="form-label">Apellido Paterno:</label>
                <input type="text" class="form-control" id="paterno" name="paterno" value="<?php echo $paterno; ?>" readonly>
            </div>
            </div>
        </form>

        <h2>Propiedades</h2>
        <?php if (mysqli_num_rows($resultadoPropiedades) > 0): ?>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Zona</th>
                        <th>Metros Cuadrados</th>
                        <th>Distrito</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($propiedad = mysqli_fetch_array($resultadoPropiedades)): ?>
                        <tr>
                            <td><?php echo $propiedad['id']; ?></td>
                            <td><?php echo $propiedad['zona']; ?></td>
                            <td><?php echo $propiedad['superficie']; ?></td>
                            <td><?php echo $propiedad['distrito']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No tiene propiedades registradas.</p>
            <a href="agregarPropiedad.php?ci=<?php echo $ci; ?>" class="btn btn-primary">Agregar Propiedad</a>
        <?php endif; ?>

        <a href="Persona.php" class="btn btn-secondary ms-2">Volver</a>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
