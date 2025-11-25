<?php
session_start();
require __DIR__ . '/config_database.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
header('Location: index.php');
exit;
}


$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';


if (!$username || !$password) {
echo "Faltan datos.";
exit;
}


try {
$stmt = $pdo->prepare('SELECT id, username, password FROM users WHERE username = ? LIMIT 1');
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);


if ($user && password_verify($password, $user['password'])) {
// Login OK
$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];
header('Location: index.php');
exit;
} else {
echo "Usuario o contraseña incorrectos.";
}
} catch (Exception $e) {
echo "Error en el servidor.";
}