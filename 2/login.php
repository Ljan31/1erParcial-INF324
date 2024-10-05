<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    include 'conexion.php';
    $query = "SELECT * FROM usuario WHERE ci = '$usuario' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $fila = mysqli_fetch_assoc($result);
        
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = $fila['rol'];
        header('Location: index.php');
    } else {
        echo "<script type='text/javascript'>
                alert('Usuario o contraseña incorrecta, intente de nuevo');
              </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Login HAM-LP</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .global-container {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .login-form {
            width: 400px;
            margin-top: 20px;
        }
    </style>
</head>
<body>


        <?php include('./nav.php'); ?>

    <div class="global-container">
        <div class="login-form card">
            <div class="card-body">
                <h3 class="card-title text-center">Login HAM-LP</h3>
                <div class="card-text">
                    <form method="POST" action="">
                        <div class="form-group mb-3">
                            <label for="usuario">Usuario: </label>
                            <input type="text" class="form-control form-control-sm" id="usuario" name="usuario" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Contraseña: </label>
                            <input type="password" class="form-control form-control-sm" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center mt-4 py-3 bg-light">
        <p>&copy; 2024 Administración de Catastros. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
