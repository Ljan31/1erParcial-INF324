<?php 
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'administrativo') {
    header("Location: login.php");
    exit();
}


$message = ''; // Variable para almacenar mensajes
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "conexion.php";
  
    $id = $_POST['id'];
    $zona = $_POST['zona'];
    $xini = $_POST['xini'];
    $yini = $_POST['yini'];
    $xfin = $_POST['xfin'];
    $yfin = $_POST['yfin'];
    $superficie = $_POST['superficie'];
    $ci = $_POST['ci'];
    $distrito = $_POST['distrito'];
    $distritos = [
        'I' => 'Cotahuma',
        'II' => 'Max Paredes',
        'III' => 'Periférica',
        'IV' => 'San Antonio',
        'V' => 'Sur',
        'VI' => 'Mallasa',
        'VII' => 'Centro',
        'VIII' => 'Hampaturi',
        'IX' => 'Zongo'
    ];


    $nombreDistrito = isset($distritos[$distrito]) ? $distritos[$distrito] : null;
    $sql = "INSERT INTO catastro (id, zona, xini, yini, xfin, yfin, superficie, ci, distrito) 
            VALUES ('$id', '$zona', '$xini', '$yini', '$xfin', '$yfin', '$superficie', '$ci', '$nombreDistrito')";

  
    if (mysqli_query($conn, $sql)) {
        $message = "Catastro agregado correctamente.";
    } else {
        $message = "Error al agregar el catastro: " . mysqli_error($conn);
    }
  
    mysqli_close($conn); // Cerrar la conexión a la base de datos

    // Redirigir después de 2 segundos
    echo "<script>
            setTimeout(function() {
                window.location.href = 'catastro.php';
            }, 1000);
          </script>";
}
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

    <main class="container mt-5">
        <div class="text-center mb-4">
            <h1>Nuevo Catastro</h1>
        </div>
        <?php if ($message): ?>
            <div class="alert alert-info text-center" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
	
	    <form action="" method="POST">
		    <div class="mb-3">
			    <label for="id" class="form-label">ID</label>
			    <input type="text" class="form-control" id="id" name="id" value="">
		    </div>
		    
		    <div class="mb-3 row">
                <div class="col">
                    <label for="xini" class="form-label">X Inicio</label>
                    <input type="text" class="form-control" id="xini" name="xini" value="">
                </div>
                <div class="col">
                    <label for="yini" class="form-label">Y Inicio</label>
                    <input type="text" class="form-control" id="yini" name="yini" value="">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col">
                    <label for="xfin" class="form-label">X Fin</label>
                    <input type="text" class="form-control" id="xfin" name="xfin" value="">
                </div>
                <div class="col">
                    <label for="yfin" class="form-label">Y Fin</label>
                    <input type="text" class="form-control" id="yfin" name="yfin" value="">
                </div>
            </div>

            <div class="mb-3 row">
              <div class="col">
                <label for="superficie" class="form-label">Metros Cuadrados</label>
                <input type="text" class="form-control" id="superficie" name="superficie" value="">
              </div>
              <div class="col">
                <label for="ci" class="form-label">CI</label>
                <input type="text" class="form-control" id="ci" name="ci" value="">
              </div>
            </div>
		    <div class="mb-3 row">
          <div class="col">
            <label for="zona" class="form-label">Zona</label>
            <input type="text" class="form-control" id="zona" name="zona" value="">
          </div>
          <div class="col">
              <label for="distrito" class="form-label">Distrito</label>
              <select class="form-select" id="distrito" name="distrito">
                  <option value="I">Cotahuma</option>
                  <option value="II">Max Paredes</option>
                  <option value="III">Periférica</option>
                  <option value="IV">San Antonio</option>
                  <option value="V">Sur</option>
                  <option value="VI">Mallasa</option>
                  <option value="VII">Centro</option>
                  <option value="VIII">Hampaturi</option>
                  <option value="IX">Zongo</option>
              </select>
          </div>
		    </div>
		    <input type="submit" name="Aceptar" value="Aceptar" class='btn btn-primary'/>
		    <a href="catastro.php" class="btn btn-secondary ms-2">Cancelar</a>
	    </form>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
