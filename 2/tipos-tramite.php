<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información Adicional - Administración de Catastros</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

    <?php
    include('./nav.php');
    ?>

    <div class="container mt-4">
        <div class="text-center py-3">
            <h1>Tipos de Trámites</h1>
        </div>

        <div class="container mt-4" id="tipos-tramites">
            <h2>Tipos de Trámites</h2>
            <ul class="list-group">
                <li class="list-group-item">1. Solicitud de Ficha Catastral</li>
                <li class="list-group-item">2. Renovación de Registro Catastral</li>
                <li class="list-group-item">3. Consulta de Estado de Solicitud</li>
                <li class="list-group-item">4. Rectificación de Datos Catastrales</li>
                <li class="list-group-item">5. Consulta de Información General</li>
            </ul>
        </div>

        <h2>Información Adicional</h2>
        <p>Aquí encontrarás información importante sobre la administración de catastros, incluyendo:</p>
        <ul>
            <li>Normativas y regulaciones sobre la gestión catastral.</li>
            <li>Estudios recientes sobre el impacto del catastro en la planificación urbana.</li>
            <li>Recursos y enlaces útiles para propietarios y profesionales del sector.</li>
        </ul>
    </div>

    <div class="container mt-4" id="ficha-catastral">
        <h2>Ficha Catastral</h2>
        <p>La Autoridad Catastral Municipal pone a disposición del público en general las nuevas Fichas Catastrales, utilizadas para realizar el Registro Catastral en el Municipio de La Paz.</p>
        <h4>Guías y Descargas:</h4>
        <ul>
            <li><a href="http://sitservicios.lapaz.bo/sit/FDRC">Ficha Catastral Digital (FDRC)</a></li>
            <li><a href="http://sitservicios.lapaz.bo/sit/FDRC/descargas.html">Descargar aplicativo Ficha Catastral</a></li>
            <li><a href="https://igob247.lapaz.bo">iGob24/7</a></li>
            <li><a href="https://www.lapaz.bo">LaPaz.bo</a></li>
        </ul>
    </div>

    <footer class="text-center mt-4 py-3 bg-light">
        <p>&copy; 2024 Administración de Catastros. Todos los derechos reservados.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
