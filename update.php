<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
require __DIR__ . '/config_database.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: read.php');
    exit;
}

try {
    $stmt = $pdo->prepare('SELECT * FROM productos WHERE id = ? LIMIT 1');
    $stmt->execute([$id]);
    $p = $stmt->fetch();
    if (!$p) {
        die('Producto no encontrado.');
    }
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Editar Producto</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <main class="container">
    <header class="card header-card">
      <h1>Editar producto #<?php echo $p['id']; ?></h1>
      <a href="read.php" class="btn btn-outline">Volver al listado</a>
    </header>

    <section class="card form-card">
      <form action="update_process.php?id=<?php echo $p['id']; ?>" method="post" autocomplete="off">
        <label for="articulo">Artículo</label>
        <input id="articulo" name="articulo" value="<?php echo htmlspecialchars($p['articulo']); ?>" required>

        <label for="categoria">Categoría</label>
        <input id="categoria" name="categoria" value="<?php echo htmlspecialchars($p['categoria']); ?>" required>

        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre" value="<?php echo htmlspecialchars($p['nombre']); ?>" required>

        <label for="proveedor">Proveedor</label>
        <input id="proveedor" name="proveedor" value="<?php echo htmlspecialchars($p['proveedor']); ?>" required>

        <label for="marca">Marca</label>
        <input id="marca" name="marca" value="<?php echo htmlspecialchars($p['marca']); ?>">

        <label for="modelo">Modelo</label>
        <input id="modelo" name="modelo" value="<?php echo htmlspecialchars($p['modelo']); ?>">

        <label for="descripcion">Descripción</label> <br>
        <textarea id="descripcion" name="descripcion"><?php echo htmlspecialchars($p['descripcion']); ?></textarea>
<br>
        <label for="precio">Precio</label>
        <input id="precio" name="precio" type="number" step="0.01" value="<?php echo htmlspecialchars($p['precio']); ?>" required>

        <label for="cantidad">Cantidad</label>
        <input id="cantidad" name="cantidad" type="number" value="<?php echo htmlspecialchars($p['cantidad']); ?>" required>

        <label for="fecha_ingreso">Fecha ingreso</label>
        <input id="fecha_ingreso" name="fecha_ingreso" type="date" value="<?php echo htmlspecialchars($p['fecha_ingreso']); ?>">

        <label for="estado">Estado</label>
        <input id="estado" name="estado" value="<?php echo htmlspecialchars($p['estado']); ?>">

        <button class="btn" type="submit">Actualizar</button>
      </form>
    </section>
  </main>
</body>
</html>
