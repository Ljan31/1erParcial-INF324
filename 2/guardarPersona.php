<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['rol'] !== 'administrativo') {
    header("Location: login.php");
    exit();
}

include 'conexion.php';

// Obtener datos del formulario
$ci = $mysqli->real_escape_string($_POST['ci']);
$nombre = $mysqli->real_escape_string($_POST['nombre']);
$paterno = $mysqli->real_escape_string($_POST['paterno']);

// Guardar en la base de datos
$query = "INSERT INTO persona (ci, nombre, paterno) VALUES ('$ci', '$nombre', '$paterno')";

if ($mysqli->query($query) === TRUE) {
    echo "Persona registrada exitosamente.";
} else {
    echo "Error: " . $query . "<br>" . $mysqli->error;
}

$mysqli->close();
?>
