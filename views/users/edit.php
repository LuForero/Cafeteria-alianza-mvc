<?php
session_start();
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/nav.php';
?>

<div class="container mt-4">
    <h2>Editar Usuario</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="/?controller=user&action=edit&id=<?= $user['id'] ?>" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required
                   value="<?= htmlspecialchars($user['email']) ?>" />
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <select name="role" id="role" class="form-select" required>
                <option value="cliente" <?= $user['role'] === 'cliente' ? 'selected' : '' ?>>Cliente</option>
                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="/?controller=user&action=index" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
