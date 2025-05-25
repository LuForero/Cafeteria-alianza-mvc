<?php
session_start();
?>

<?php if (isset($_SESSION['user'])): ?>
    <h1>Bienvenido, <?= htmlspecialchars($_SESSION['user']['nombre']) ?>!</h1>
<?php else: ?>
    <h1>Bienvenido, visitante</h1>
    <p><a href="/login">Inicia sesión</a></p>
<?php endif; ?>
