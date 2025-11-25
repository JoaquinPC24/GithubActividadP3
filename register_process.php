<?php
require __DIR__ . '/config_database.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
header('Location: index.php');
exit;
}


$nombre = trim($_POST['nombre_completo'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';


if (!$nombre || !$username || !$password) {
echo "Todos los campos son obligatorios.";
exit;
}


// Validaciones básicas
if (strlen($password) < 4) {
echo "Contraseña demasiado corta.";
exit;
}


$hash = password_hash($password, PASSWORD_DEFAULT);


try {
$stmt = $pdo->prepare('SELECT id FROM users WHERE username = ? LIMIT 1');
$stmt->execute([$username]);
if ($stmt->fetch()) {
echo "El usuario ya existe.";
exit;
}


$insert = $pdo->prepare('INSERT INTO users (nombre_completo, username, password) VALUES (?, ?, ?)');
$insert->execute([$nombre, $username, $hash]);


echo "Registro exitoso. <a href=\"index.php\">Volver al inicio</a>";
} catch (Exception $e) {
echo "Error al registrar.";
}