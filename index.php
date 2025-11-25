<?php
session_start();
// Si ya está logueado, puede redirigir o mostrar mensaje
$logged = isset($_SESSION['user_id']);
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>ActividadGitHub - Inicio</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<main class="container">
<header class="card header-card">
<h1>ActividadGitHub - Sistema CRUD</h1>
<p class="subtitle">Proyecto de ejemplo: login, registro y CRUD</p>
</header>


<section class="card actions">
<?php if (!$logged): ?>
<form method="post">
<button type="submit" name="open_login" class="btn">Iniciar sesión</button>
<button type="submit" name="open_register" class="btn btn-outline">Registrarse</button>
</form>


<?php
// Requiere los archivos directamente cuando se presione el botón
if (isset($_POST['open_login'])) {
require __DIR__ . '/login.php';
exit;
}
if (isset($_POST['open_register'])) {
require __DIR__ . '/register.php';
exit;
}
?>
<?php else: ?>
<p>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?>.</p>
<a href="logout.php" class="btn">Cerrar sesión</a>
<a href="read.php" class="btn btn-outline">Ir al CRUD</a>
<?php endif; ?>
</section>


<footer class="footer">Hecho para la actividad de Git y Git Flow</footer>
</main>
</body>
</html>