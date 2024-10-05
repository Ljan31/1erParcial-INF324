<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Catastros</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>


    <?php
    include('./nav.php');
    
    ?>

<div class="container mt-4" id="info-general">
    <h2>Información General</h2>
    <p>Esta aplicación permite a los usuarios gestionar el pago de impuestos sobre la propiedad de manera eficiente. Al ingresar con su cuenta, se puede acceder a información específica utilizando el código catastral. Dependiendo del prefijo de este código, el sistema determina el tipo de impuesto: aquellos que comienzan con '1' son clasificados como de alto valor, los que empiezan con '2' como medio, y los que inician con '3' como de bajo valor. Esto facilita la planificación fiscal y asegura una recaudación justa y adecuada.</p>
</div>


    <footer class="text-center mt-4 py-3 bg-light">
        <p>&copy; 2024 Administración de Catastros. Todos los derechos reservados.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
