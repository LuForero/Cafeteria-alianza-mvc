<?php
session_start();
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/nav.php';
?>

<div class="container mt-4">
    <h2>Usuarios</h2>
    <a href="/?controller=user&action=create" class="btn btn-primary mb-3">Agregar Usuario</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['id']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['role']) ?></td>
                <td>
                    <a href="/?controller=user&action=edit&id=<?= $user['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="/?controller=user&action=delete&id=<?= $user['id'] ?>" class="btn btn-danger btn-sm" 
                       onclick="return confirm('¿Seguro quieres eliminar este usuario?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
