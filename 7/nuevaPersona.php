<?php 
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'administrativo') {
    header("Location: login.php");
    exit();
}

$message = ''; // Variable para almacenar mensajes

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "conexion.php";
    
    $ci = $_POST['ci'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $rol = $_POST['rol']; // Obtener el rol del formulario
    
    // Insertar en la tabla persona
    $sql = "INSERT INTO persona (ci, nombre, paterno) VALUES ('$ci', '$nombre', '$paterno')";
    
    if (mysqli_query($conn, $sql)) {
        // Insertar en la tabla usuario
        $sqlUsuario = "INSERT INTO usuario (ci, password, rol) VALUES ('$ci', '$ci', '$rol')";
        
        if (mysqli_query($conn, $sqlUsuario)) {
            $message = "Persona y usuario agregados correctamente.";
        } else {
            $message = "Persona agregada, pero error al agregar usuario: " . mysqli_error($conn);
        }
    } else {
        $message = "Error al agregar la persona: " . mysqli_error($conn);
    }
    
    mysqli_close($conn); // Cerrar la conexión a la base de datos

    // Redirigir después de 2 segundos
    echo "<script>
            setTimeout(function() {
                window.location.href = 'Persona.php';
            }, 1000);
          </script>";
}
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
            <h1>Nueva Persona</h1>
        </div>

        <?php if ($message): ?>
            <div class="alert alert-info text-center" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
	
        <form method="post">
            <div class="mb-3">
                <label for="ci" class="form-label">CI:</label>
                <input type="number" class="form-control" name="ci" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="paterno" class="form-label">Apellido Paterno:</label>
                <input type="text" class="form-control" name="paterno" required>
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Rol:</label>
                <select class="form-select" name="rol" required>
                    <option value="dueño">Dueño</option>
                    <option value="administrativo">Administrativo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Insertar</button>
            <a href="Persona.php" class="btn btn-secondary ms-2">Cancelar</a>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
