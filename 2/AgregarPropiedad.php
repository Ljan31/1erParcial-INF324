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

$message = ''; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idCatastro = $_POST['catastro'];
    
    $sqlUpdate = "UPDATE catastro SET ci = '$ci' WHERE id = $idCatastro";
    
    if (mysqli_query($conn, $sqlUpdate)) {
        $message = "Catastro actualizado correctamente.";
    } else {
        $message = "Error al actualizar el catastro: " . mysqli_error($conn);
    }

    echo "<script>
            setTimeout(function() {
                window.location.href = 'Persona.php';
            }, 1000);
          </script>";
}

$sqlCatastro = "SELECT * FROM catastro WHERE ci = 0";
$resultadoCatastro = mysqli_query($conn, $sqlCatastro);
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

    <main class="container mt-5">
        <div class="text-center mb-4">
            <h1>Agregar Propiedad</h1>
        </div>
        
        <?php if ($message): ?>
            <div class="alert alert-info text-center" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
	

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
        
        <form method="POST">
            <div class="mb-3">
                <label for="catastro" class="form-label">Seleccionar Catastro:</label>
                <select class="form-select" name="catastro" required>
                    <option value="">Seleccione un catastro</option>
                    <?php while ($catastro = mysqli_fetch_array($resultadoCatastro)): ?>
                        <option value="<?php echo $catastro['id']; ?>">
                            <?php echo $catastro['id'] . ' - ' . $catastro['zona'] . ' - ' . $catastro['superficie'] . ' m² ' . ' - ' . $catastro['distrito']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a class="btn btn-success" href="NuevoCatastro.php">Nuevo Catastro</a>
                <a href="Persona.php" class="btn btn-secondary ms-2">Cancelar</a>
            </div>
        </form>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
