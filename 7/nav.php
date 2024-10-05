<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
    <div class="bg-primary text-white text-center py-3">
        <h1>Municipio de La Paz HAM-LP</h1>
        <!-- <h2>Autoridad Catastral Municipal</h2> -->
    </div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="index.php"> 

<?php if (!isset($_SESSION['usuario'])): ?>
    <!-- Mostrar Login solo si no hay sesión -->
    
<?php else: ?>
    <!-- Si hay sesión, mostrar Logout -->
    <span class="navbar-text">
        Bienvenido, <?php echo htmlspecialchars($_SESSION['rol']); ?>
    </span>
<?php endif; ?>


</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
<div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <a class="navbar-brand" href="index.php">HAM-LP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="navbar-nav">

            <?php if (isset($_SESSION['usuario'])): ?>
                <!-- Menú para usuarios autenticados -->
                <?php if ($_SESSION['rol'] === 'administrativo'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="Persona.php">Persona</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Catastro.php">Visualizar Propiedades</a>
                    </li>
                <?php elseif ($_SESSION['rol'] === 'dueño'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="VerPropiedadesDueno.php">Ver Mis Propiedades</a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
            <?php if (!isset($_SESSION['usuario'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            <?php else: ?>
                <!-- Si hay sesión, mostrar Logout -->
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
