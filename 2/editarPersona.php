<?php 
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'administrativo') {
    header("Location: login.php");
    exit();
}
$ci=$_GET["ci"];

include "conexion.php";
$sql="select * from persona where ci=$ci";
$resultado=mysqli_query($conn, $sql);
$fila=mysqli_fetch_array($resultado);
$ci=$fila["ci"];
$nombre=$fila["nombre"];
$paterno=$fila["paterno"];


$message = ''; // Variable para almacenar mensajes
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include "conexion.php";
  
  $ci = $_POST['ci'];
  $nombre = $_POST['nombre'];
  $paterno = $_POST['paterno'];
  
  $sql="update persona set nombre='$nombre', paterno='$paterno' where ci=$ci";
  
  if (mysqli_query($conn, $sql)) {
      $message = "Persona modificada correctamente.";
  } else {
      $message = "Error al modificar la persona: " . mysqli_error($conn);
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
	
	<form action="" method="POST">
		 <div class="mb-3">
			<label for="id" class="form-label">ci</label>
			<input type="text" class="form-control" id="ci" name="ci" value="<?php echo $ci; ?>"  readonly>
		</div>
		 <div class="mb-3">
			<label for="nombre" class="form-label">Nombre</label>
			<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
		</div>
		<div class="mb-3">
			<label for="paterno" class="form-label">Paterno</label>
			<input type="text" class="form-control" id="paterno" name="paterno" value="<?php echo $paterno; ?>">
		</div>
		<input type="submit" name="Aceptar" value="Aceptar" class='btn btn-primary'/>
		
    <a href="Persona.php" class="btn btn-secondary ms-2">Cancelar</a>
	</form>
</body>
<html>