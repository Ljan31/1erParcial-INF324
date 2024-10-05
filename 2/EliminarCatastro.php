<?php 
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'administrativo') {
    header("Location: login.php");
    exit();
}

include "conexion.php";
$id = $_GET["id"];
$sql = "DELETE FROM catastro WHERE id = $id";

if (mysqli_query($conn, $sql) && mysqli_affected_rows($conn) > 0) {
    $message = "Catastro eliminada correctamente.";
    $alertType = "success"; // Tipo de alerta (success, danger)
} else {
    $message = "Error al eliminar catastro.";
    $alertType = "danger"; // Tipo de alerta (success, danger)
}

mysqli_close($conn); // Cerrar la conexión
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Catastros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    
    <?php include('./nav.php'); ?>

    <div class="container mt-5">
        <div class="alert alert-<?= $alertType ?> alert-dismissible fade show" role="alert">
            <?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        setTimeout(function() {
            window.location.href = 'Catastro.php';
        }, 1500); // Redirigir después de 2 segundos
    </script>
</body>
</html>
