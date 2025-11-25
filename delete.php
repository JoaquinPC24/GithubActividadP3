<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
require __DIR__ . '/config_database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: read.php');
    exit;
}

$id = $_POST['id'] ?? null;
if (!$id) {
    die('ID inválido.');
}

try {
    $stmt = $pdo->prepare('DELETE FROM productos WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: read.php');
    exit;
} catch (Exception $e) {
    die('Error al eliminar: ' . $e->getMessage());
}
