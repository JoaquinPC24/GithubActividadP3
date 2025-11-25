<?php
// Formulario de login simple (se procesa en login_process.php si se envía)
?>
<section class="card form-card">
<h2>Iniciar sesión</h2>
<form action="login_process.php" method="post" autocomplete="off">
<label for="username">Usuario</label>
<input id="username" name="username" required>


<label for="password">Contraseña</label>
<input id="password" name="password" type="password" required>


<button type="submit" class="btn">Entrar</button>
</form>
<p class="muted">¿No tienes cuenta? Vuelve al inicio y pulsa Registrarse.</p>
</section>