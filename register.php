<?php
// Formulario de registro (procesado por register_process.php)
?>
<section class="card form-card">
<h2>Registro</h2>
<form action="register_process.php" method="post" autocomplete="off">
<label for="nombre_completo">Nombre completo</label>
<input id="nombre_completo" name="nombre_completo" required>


<label for="username">Usuario</label>
<input id="username" name="username" required>


<label for="password">Contraseña</label>
<input id="password" name="password" type="password" required>


<button type="submit" class="btn">Crear cuenta</button>
</form>
<p class="muted">Al registrarte se guardará tu contraseña en forma segura (hash).</p>
</section>