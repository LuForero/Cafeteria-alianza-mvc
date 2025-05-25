<?php require 'views/layout/header.php'; ?>

<h2>Registro de usuario</h2>

<?php if ($error): ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php elseif ($success): ?>
    <div class="alert alert-success"><?= $success ?></div>
<?php endif; ?>

<form method="POST">
    <div class="mb-3">
        <label for="username" class="form-label">Correo electrónico</label>
        <input type="email" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password_confirm" class="form-label">Confirmar contraseña</label>
        <input type="password" name="password_confirm" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
</form>

<?php require 'views/layout/footer.php'; ?>
