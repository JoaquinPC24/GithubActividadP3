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

$id = $_GET['id'] ?? null;
if (!$id) {
    die('ID inválido.');
}

$articulo = trim($_POST['articulo'] ?? '');
$categoria = trim($_POST['categoria'] ?? '');
$nombre = trim($_POST['nombre'] ?? '');
$proveedor = trim($_POST['proveedor'] ?? '');
$marca = trim($_POST['marca'] ?? null);
$modelo = trim($_POST['modelo'] ?? null);
$descripcion = trim($_POST['descripcion'] ?? null);
$precio = $_POST['precio'] ?? 0;
$cantidad = $_POST['cantidad'] ?? 0;
$fecha_ingreso = $_POST['fecha_ingreso'] ?: date('Y-m-d');
$estado = trim($_POST['estado'] ?? null);

if (!$articulo || !$categoria || !$nombre) {
    die('Faltan campos obligatorios.');
}

try {
    $sql = "UPDATE productos SET articulo = ?, categoria = ?, nombre = ?, proveedor = ?, marca = ?, modelo = ?, descripcion = ?, precio = ?, cantidad = ?, fecha_ingreso = ?, estado = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$articulo, $categoria, $nombre, $proveedor, $marca, $modelo, $descripcion, $precio, $cantidad, $fecha_ingreso, $estado, $id]);
    header('Location: read.php');
    exit;
} catch (Exception $e) {
    die('Error al actualizar: ' . $e->getMessage());
}
