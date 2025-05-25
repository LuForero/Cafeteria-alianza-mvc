<?php
session_start();
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/nav.php';
?>

<div class="container mt-4">
    <h2>Crear Usuario</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="/?controller=user&action=create" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required />
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" required minlength="6" />
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <select name="role" id="role" class="form-select" required>
                <option value="cliente">Cliente</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="/?controller=user&action=index" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
