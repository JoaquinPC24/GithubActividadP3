<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
require __DIR__ . '/config_database.php';

try {
    $stmt = $pdo->query('SELECT * FROM productos ORDER BY id DESC');
    $productos = $stmt->fetchAll();
} catch (Exception $e) {
    die('Error cargando productos: ' . $e->getMessage());
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Productos - Listado</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <main class="container">
    <header class="card header-card">
      <h1>Listado de Productos</h1>
      <p class="subtitle">Usuario: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
      <div style="margin-top:10px;">
        <a href="create.php" class="btn">Nuevo producto</a>
        <a href="index.php" class="btn btn-outline">Inicio</a>
        <a href="logout.php" class="btn btn-outline">Cerrar sesión</a>
      </div>
    </header>

    <section class="card">
      <?php if (empty($productos)): ?>
        <p>No hay productos aún.</p>
      <?php else: ?>
        <table style="width:100%;border-collapse:collapse">
          <thead>
            <tr>
              <th>ID</th>
              <th>Artículo</th>
              <th>Categoría</th>
              <th>Nombre</th>
              <th>Proveedor</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Fecha</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($productos as $p): ?>
            <tr>
              <td><?php echo $p['id']; ?></td>
              <td><?php echo htmlspecialchars($p['articulo']); ?></td>
              <td><?php echo htmlspecialchars($p['categoria']); ?></td>
              <td><?php echo htmlspecialchars($p['nombre']); ?></td>
              <td><?php echo htmlspecialchars($p['proveedor']); ?></td>
              <td><?php echo htmlspecialchars($p['precio']); ?></td>
              <td><?php echo htmlspecialchars($p['cantidad']); ?></td>
              <td><?php echo htmlspecialchars($p['fecha_ingreso']); ?></td>
              <td><?php echo htmlspecialchars($p['estado']); ?></td>
              <td>
                <a class="btn" href="update.php?id=<?php echo $p['id']; ?>">Editar</a>
                <form method="post" action="delete.php" style="display:inline-block;margin-left:6px;">
                  <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
                  <button class="btn btn-outline" type="submit" onclick="return confirm('Eliminar este producto?')">Eliminar</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </section>
  </main>
</body>
</html>
